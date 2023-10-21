<?php
require('db_conn.php');
require('recherche_eleve.php');
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
  
    <div class="">
        <form class="search-bar" action="pedagogie.php" method="POST">
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
   <form method="get" action="index.php">
    <button class="image-button" type="submit" name="logout"></button>
        
  </form>
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

   
    </div>
   </div>
  </div>
  <div class="main-container">
   <div class="main-header">
   
    <div class="header-menu">
     <a class="main-header-link " href="pedagogie.php">Eleves</a>
     <a class="main-header-link" href="Adherent.php">Adherant</a>     
     <a class="main-header-link" href="Cours.php">Cours</a>
     <a class="main-header-link  is-active" href="">Examen</a>
     <a class="main-header-link" href="Salles.php">Salles</a>
     <a class="main-header-link" href="/Gestion_des_eleves/Rapport/Rapport.php">Rapport</a>
     <a class="main-header-link" href="/Gestion_des_eleves/presence par niveau/Presence.php">Presence</a>
     <a class="main-header-link" href="StatNiveau.php">Statistique par Niveau</a>
    </div>
   </div>
   <div class="content-wrapper">
          <form method="get" action="ajouter_examen.php">
              <button class="image-button-plus" type="submit"></button>                            
          </form>
     <div class="container-items">  
       <!--tableau-->
       <table>
           <thead>
               <tr>
                   <th scope="col" class="resizeable-th">ID</th>            
                   <th scope="col" class="resizeable-th">Nom</th>
                   <th scope="col" class="resizeable-th">Date</th>
                   <th scope="col" class="resizeable-th">Code Session</th>
                   <th scope="col" class="resizeable-th">Inscrit</th>
                   <th scope="col" class="resizeable-th">Capacite</th>

               </tr>
               
           </thead>
           <tbody>
           <!-- connexion DB_tab-->
           <?php

            $sql = "SELECT * FROM examen";
            $stmt = $conn->query($sql);
           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               ?>
               <tr>              
                   <td class="resizeable-td"><?php echo $row['id'] ?></td>                
                   <td class="resizeable-td"><?php echo $row['nom'] ?></td>
                   <td class="resizeable-td"><?php echo $row['date'] ?></td>
                   <td class="resizeable-td"><?php echo $row['code_session'] ?></td>
                   <td class="resizeable-td"><?php echo $row['inscrit'] ?></td>
                   <td class="resizeable-td"><?php echo $row['capacite'] ?></td>

               </tr>              
               <?php
           }
           ?>

           </tbody>
       </table> 
       
     </div>   
</div>
  </div>
 </div>
 <div class="overlay-app"></div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="./script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>