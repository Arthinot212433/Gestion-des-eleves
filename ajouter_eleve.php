<?php
require('db_conn.php');
require('recherche_eleve.php');


if(isset($_POST['submit'])) {
    $id_Adh = $_POST['id_Adh'];
    $date_InscriEleve = $_POST['date_InscriEleve'];
    $id_Cours = $_POST['id_Cours'];
    $lib_Niveau = $_POST['lib_Niveau'];

    try {
        $sql = "INSERT INTO `alliance`.`inscrieleve` (`date_InscriEleve`, `id_Adh`, `id_Cours`, `lib_Niveau`) 
                VALUES (:date_InscriEleve, :id_Adh, :id_Cours, :lib_Niveau)";
        
        $stmt = $conn->prepare($sql);  
        $stmt->bindParam(':id_Adh', $id_Adh);
        $stmt->bindParam(':date_InscriEleve', $date_InscriEleve);
        $stmt->bindParam(':id_Cours', $id_Cours);
        $stmt->bindParam(':lib_Niveau', $lib_Niveau);

        $stmt->execute();

        if($stmt->rowCount() > 0) {
            header("Location: ajouter_eleve.php?msg=creation avec succes");
            exit();
        } else {
            echo "Échec de l'insertion des données.";
        }
    } catch(PDOException $e) {
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
      <link rel="stylesheet" href="./style.css">
      <!-- Inclure Font Awesome depuis un CDN -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
      <form class="search-bar" method="POST">
        <input type="text" name="search" placeholder="Search">
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
     <a class="main-header-link is-active" href="pedagogie.php">Eleves</a>
     <a class="main-header-link" href="Adherent.php">Adherant</a>     
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
                        <label class="form-label">N°Eleve:</label>
                        <select class="form-control" name="id_Adh">
                            <optgroup label="N°Eleve">                  
                        <?php
                        $sql_a= "SELECT id_Adh FROM adherent WHERE id_Adh NOT IN (SELECT id_Adh FROM inscrieleve) ORDER BY `adherent`.`id_Adh` DESC";     
                        $result_a = $conn->query($sql_a);
                        while ($row_a = $result_a->fetch(PDO::FETCH_ASSOC)){ ?>
                            <option value = "<?=$row_a['id_Adh'] ?>"><?=$row_a['id_Adh'] ?></option>
                        <?php } ?>
                        </optgroup>
                        </select>
                    </div>

                    <div class="labInput">
                        <label class="form-label">Date:</label>
                        <input type="date" class="form-control-date" name='date_InscriEleve' required>
                    </div>          
                    
                    <div class="labInput">
                        <label class="form-label">Cours:</label>
                    
                        <select class="form-control" name="id_Cours">
                            <optgroup label="Cours">                  
                        <?php
                        $sql_p= "SELECT * FROM cours";     
                        $result_p = $conn->query($sql_p);
                        while ($row_p = $result_p->fetch(PDO::FETCH_ASSOC)){ ?>
                            <option value = "<?=$row_p['id_Cours'] ?>"><?=$row_p['nom_Cours'] ?></option>
                        <?php } ?>
                        </optgroup>
                        </select>  
                    </div>
                    <div class="labInput">
                    <label class="form-label">Niveau:</label>
                        <select class="form-control" name="lib_Niveau">
                            <optgroup label="Niveau">                  
                        <?php
                        $sql_n= "SELECT * FROM niveau";     
                        $result_n = $conn->query($sql_n);
                        while ($row_n = $result_n->fetch(PDO::FETCH_ASSOC)){ ?>
                            <option value = "<?=$row_n['lib_Niveau'] ?>"><?=$row_n['lib_Niveau'] ?></option>
                        <?php } ?>
                        </optgroup>
                        </select>  
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
                        
                        <a class="image-button-retour" href="pedagogie.php">                            
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
