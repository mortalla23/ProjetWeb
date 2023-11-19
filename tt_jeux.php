<?php
session_start();

$nom = $_POST['NOMJ'];

$photoContent = $_FILES['FILE']['name']; // Récupérer le nom du fichier image


        require_once("connpdo.php");

        $req = "INSERT INTO jeux (NOMJ, FILE) VALUES (?, ?)";
        $ps = $pdo->prepare($req);
        $params = array($nom, $photoContent);

        if ($ps->execute($params)) {
            $_SESSION['message'] = "Ajout réussi.";
            header("location:listejeu.php");
        } else {
            $_SESSION['message'] = "Problème Ajout.";
            header("location:Ajoutjeu.php");
        }
   
    


?>
