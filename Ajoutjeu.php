<?php
if (!empty($_GET['id'])) {
    $host = 'localhost';
    $login = 'root';
    $passwd = '';  // Assurez-vous de remplacer cela par votre mot de passe réel
    $dbname = 'espacemembres';

    // Créer une connexion et sélectionner la base de données
    $db = new mysqli($host, $login, $passwd, $dbname);

    // Vérifier la connexion
    if ($db->connect_error) {
        die("Erreur de connexion: " . $db->connect_error);
    }

    // Utilisation d'une déclaration préparée pour éviter les injections SQL
    $stmt = $db->prepare("SELECT FILE FROM jeux WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $image = $res->fetch_assoc();

        // Définir le type de contenu en fonction du format de l'image (par exemple, PNG ici)
        header("Content-type: image/png");

        // Afficher l'image
        echo $image['FILE'];
    } else {
        echo 'Image non trouvée...';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <title>Document Admin</title>
</head>
<body>
    <nav class="cc-navbar navbar navbar-expand-lg position-fixed navbar-dark w-100">
        <div class="container">
          <a class="nav-link" class="navbar-brand test-uppercase fw-bolder mx-4 py-3" href="presen.php">GameSphère</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item pe-2">
                <a class="nav-link active" aria-current="page" href="creeradmin.php">Créer Admin</a>
              </li>
              
              <li class="nav-item pe-2">
                <a class="nav-link" href ="Ajoutjeu.php">Ajout Jeu</a>
              </li>
              
              <li class="nav-item pe-2">
                <a class="nav-link" href ="suppjeu.php">Supprimer Jeu</a>
              </li>
              
              
              
            </ul>
            <ul class="navbar-nav mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Déconnexion</a>
                </li>
        
              </ul>
          </div>
        </div>
      </nav>

      
      <section class="banner d-flex justify-content-center align-items-center pt-5"> 
        <h1 class=" text-center redressed banner-desc">
            Bienvenue Administateur!
         </h1> 
        <div class="container my-5 py-5">
            <h1 class="text-capitalize text-center redressed banner-desc">
                 <u>GameSphère</u> <br />
                 Ajout un jeu
            </h1>    
            
            <div class ="row">
               
                    <form  method="POST" action="tt_jeux.php" enctype="multipart/form-data">
                        
                        
                        <div class="container">
                        <div class="row my-3">
                            
                            <div class="col-md-10">
                                <label for="NOMJ" class="form-label">Nom de jeux</label>
                                <input type="text" class="form-control " id="NOMJ" name="NOMJ" placeholder="Nom du jeux..." required>
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Ajout d'une photo </label>
                                <input type="file" name="FILE" class="form-control" />
                               
                              </div>
                        </div>
                       
                            <section class="centre">
                                
                            <div class="row my-3">
                                <div class="col-md-2">
                            <div class="d-grid gap-2 d-ms-block">
                                <button class="btn btn-outline-primary md-6" type="submit">Ajouter</button></div>   
                            </div>
                        </div>
                            </section>
                            
                            
                        </div>
                </div>
                
            </form>
        </div>
          
        
  </section>
  <section class="footer py-5 d-flex justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <p class="text-white">&copy; 2023 Rouen | All rights reserved.</p>
            </div>
            <div class="col-6">
                <ul class="nav text-center">
                    
                    <li class="nav-item">
                        <a href="presen.php" class="nav-link text-white">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="listjeux.php" class="nav-link text-white">Jeux</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-white">Contact</a>
                    </li>
                </ul>
            </div>
            
                
        </div>
       
    </div>
  </section>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>