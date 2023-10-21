<?php
require('db_conn.php'); 
require('recherche_eleve.php'); 

if (isset($_POST['submit'])) {
    // Récupérez les données du formulaire
    $id_Adh = htmlspecialchars($_POST['id_Adh']);
    $nom_Adh = htmlspecialchars($_POST['nom_Adh']);
    $prenom_Adh = htmlspecialchars($_POST['prenom_Adh']);
    $adresse_Adh = htmlspecialchars($_POST['adresse_Adh']);
    $genre_Adh = htmlspecialchars($_POST['genre_Adh']);
    $tel_Adh = htmlspecialchars($_POST['tel_Adh']);
    $nationalite_Adh = htmlspecialchars($_POST['nationalite_Adh']);
    $naissance_Adh = htmlspecialchars($_POST['naissance_Adh']);
    $lieuNaiss_Adh = htmlspecialchars($_POST['lieuNaiss_Adh']);

    try {
        // Préparez la requête SQL avec des paramètres nommés
        $sql = "INSERT INTO `adherent` (`id_Adh`, `nom_Adh`, `prenom_Adh`, `adresse_Adh`, `genre_Adh`, `tel_Adh`, `nationalite_Adh`, `naissance_Adh`, `lieuNaiss_Adh`) 
                VALUES (:id_Adh, :nom_Adh, :prenom_Adh, :adresse_Adh, :genre_Adh, :tel_Adh, :nationalite_Adh, :naissance_Adh, :lieuNaiss_Adh)";
        
        $stmt = $conn->prepare($sql);
        
        // Associez les paramètres nommés aux valeurs
        $stmt->bindParam(':id_Adh', $id_Adh);
        $stmt->bindParam(':nom_Adh', $nom_Adh);
        $stmt->bindParam(':prenom_Adh', $prenom_Adh);
        $stmt->bindParam(':adresse_Adh', $adresse_Adh);
        $stmt->bindParam(':genre_Adh', $genre_Adh);
        $stmt->bindParam(':tel_Adh', $tel_Adh);
        $stmt->bindParam(':nationalite_Adh', $nationalite_Adh);
        $stmt->bindParam(':naissance_Adh', $naissance_Adh);
        $stmt->bindParam(':lieuNaiss_Adh', $lieuNaiss_Adh);

        // Exécutez la requête
        if ($stmt->execute()) {
            header("Location: ajouter_adherent.php?msg=Création réussie");
            exit();
        } else {
            echo "Échec de l'insertion des données.";
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>AF</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">    
      <!-- Inclure Font Awesome depuis un CDN -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="video-bg">
      <video width="320" height="240" autoplay loop muted>
        <source src="https://assets.codepen.io/3364143/7btrrd.mp4" type="video/mp4">

      </video>
  </div>
<div class="dark-light">
    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
     <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" /></svg>
   </div>
<div class="app">
 <div class="header">
  <div class="menu-circle"><img class="image" src="./aff.jpg"></div>
  <div class="header-menu">
  </div>
   <div class="">
                <form class="search-bar" action="Adherent.php" method="POST">
                    <!-- Champ caché pour indiquer une recherche -->
                    <input type="hidden" name="submit" value="true">
                    <input type="text" placeholder="Search" name="search">
                </form>
            </div>
  <div class="header-profile">
   <div class="notification">
    <span class="notification-number">3</span>
    <svg viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
     <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0" />
    </svg>
   </div>
   <svg viewBox="0 0 512 512" fill="currentColor">
    <path d="M448.773 235.551A135.893 135.893 0 00451 211c0-74.443-60.557-135-135-135-47.52 0-91.567 25.313-115.766 65.537-32.666-10.59-66.182-6.049-93.794 12.979-27.612 19.013-44.092 49.116-45.425 82.031C24.716 253.788 0 290.497 0 331c0 7.031 1.703 13.887 3.006 20.537l.015.015C12.719 400.492 56.034 436 106 436h300c57.891 0 106-47.109 106-105 0-40.942-25.053-77.798-63.227-95.449z" />
   </svg>
   <img class="profile-img" src="https://images.unsplash.com/photo-1600353068440-6361ef3a86e8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="">
  </div>
 </div>
 <div class="wrapper">
  <div class="left-side">
   <div class="side-wrapper">
    <div class="side-menu">
   <h2>Département</h2>  
   <br><br>
     <form method="get" action="direction.php">
        <button class="btnPe" type="submit">Direction</button>
    </form>
    <br><br>
     <form method="get" action="">
          <button class="btnPe active" type="submit">Pédagogie</button>
      </form>
      <br><br>
    <form method="get" action="">
        <button class="btnPe" type="submit">Bibliothèque</button>
    </form>
    <br><br>
    <form method="get" action="logistique.php">
        <button class="btnPe" type="submit">Logistique</button>
    </form>
    <form method="get" action="index.php">
        <button class="image-button" type="submit" name="logout"></button>
        
    </form>
    </div>
   </div>
  </div>
  <div class="main-container">
   <div class="main-header">
   
    <div class="header-menu">
     <a class="main-header-link " href="pedagogie.php">Eleves</a>
     <a class="main-header-link is-active" href="Adherent.php">Adherant</a>     
     <a class="main-header-link " href="Cours.php">Cours</a>
     <a class="main-header-link" href="examen.php">Examen</a>
     <a class="main-header-link" href="Salles.php">Salles</a>
     <a class="main-header-link" href="/Gestion_des_eleves/Rapport/Rapport.php">Rapport</a>
     <a class="main-header-link" href="/Gestion_des_eleves/presence par niveau/Presence.php">Presence</a>
     <a class="main-header-link" href="StatNiveau.php">Statistique par Niveau</a>
    </div>
   </div>
   <div class="content-wrapper">
     
     <div class="container-items-eleve">  
     
            <form action="" method="post">
                <div>
                    <div class="labInput">
                        <label class="form-label">N°:</label>
                        <input type="text" class="form-control" name='id_Adh' required>
                    </div>
                   
                    <div class="labInput">
                        <label class="form-label">Nom:</label>
                        <input type="text" class="form-control" name='nom_Adh' required>
                    </div>          
                    
                    <div class="labInput">
                        <label class="form-label">Prenom:</label>
                        <input type="text" class="form-control" name='prenom_Adh' required>
                    </div>

                    <div class="labInput">
                        <label class="form-label">Adresse:</label>
                        <input type="text" class="form-control" name='adresse_Adh' required>
                    </div>

                    <div class="labInput">
                        <label class="form-label">Genre:</label>
                        <input type="text" class="form-control" name='genre_Adh' required>
                    </div>

                    <div class="labInput">
                        <label class="form-label">Tel:</label>
                        <input type="text" class="form-control" name='tel_Adh' required>
                    </div>

                    <div class="labInput">
                        <label class="form-label">Nationalite:</label>
                        <input type="text" class="form-control" name='nationalite_Adh' required>
                    </div>

                    <div class="labInput">
                        <label class="form-label">Naissance:</label>
                        <input type="text" class="form-control" name='naissance_Adh' required>
                    </div>
                    
                    <div class="labInput">
                        <label class="form-label">LieuNaiss:</label>
                        <input type="text" class="form-control" name='lieuNaiss_Adh' required>
                    </div>
                            
                </div> 
                    <div>
                    <div class="buttons">
                       
                       <button class="blob-btn" type="submit" name="submit">
                           Valider
                           <span class="blob-btn__inner">
                           <span class="blob-btn__blobs">
                               <span class="blob-btn__blob"></span>
                               <span class="blob-btn__blob"></span>
                               <span class="blob-btn__blob"></span>
                               <span class="blob-btn__blob"></span>
                           </span>
                           </span>
                       </button>
                       <br/>

                       <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                       <defs>
                           <filter id="goo">
                           <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10"></feGaussianBlur>
                           <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo"></feColorMatrix>
                           <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
                           </filter>
                       </defs>
                       </svg>
                   
               </div>
                        <a class="image-button-retour" href="Adherent.php">                            
                        </a>
                        

                    </div>
            </form>
        </div>
     </div>   
</div>
  </div>
 </div>
 <div class="overlay-app"></div>
</div>
<!-- partial -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="./script.js"></script>

</body>
</html>
