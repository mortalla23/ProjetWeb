<?php
session_start(); // Pour les messages

// Contenu du formulaire :
$nom = htmlentities($_POST['nom']);
$prenom = htmlentities($_POST['prenom']);
$email = htmlentities($_POST['email']);
$password = htmlentities($_POST['password']);

$role = 1; // 1 pour membre, 2 pour Admin, 3 pour admin par exemple :o)

// Option pour bcrypt
$options = [
    'cost' => 12,
];

// Connexion :
require_once("param.inc.php");

// On utilise la connexion créée avec param.inc.php
try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $login, $passwd);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

// Vérifier si l'utilisateur existe déjà
$query = "SELECT * FROM users WHERE email = ?";
$stmt = $bdd->prepare($query);
$stmt->execute([$email]);

if ($stmt->rowCount() > 0) {
    // L'utilisateur existe déjà, gestion de l'erreur ou autre action.
    $_SESSION['message'] = "Cet utilisateur existe déjà.";
    header('Location: page_dinscription.php'); // Rediriger vers la page d'inscription avec un message d'erreur
    exit(); // Arrêter l'exécution du script après la redirection
}

// L'utilisateur n'existe pas, on peut l'insérer dans la base de données
try {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
    $stmt = $bdd->prepare("INSERT INTO users(nom, prenom, email, password, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $email, $hashed_password, $role]);

    // Le message est mis dans la session, il est préférable de séparer message normal et message d'erreur.
    $_SESSION['message'] = "Enregistrement réussi";
} catch (PDOException $e) {
    $_SESSION['message'] = "Impossible d'enregistrer : " . $e->getMessage();
}

// Redirection vers la page d'accueil par exemple :
header('Location: listejeu.php');
exit(); // Arrêter l'exécution du script après la redirection
?>
