

<?php
require('../db_conn.php');
require('../recherche_eleve.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>AF</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
     
      <!-- Inclure Font Awesome depuis un CDN -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <style>
        /* Style pour l'effet de fond sombre */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 80%;
            height: 50%;
            background-color: rgba(0, 0, 0, 0.7); 
            z-index: 1;
        }

        /* Style pour l'alerte */
        .alert-box {
            position: fixed;
            top: 25%;
            left: 85%;
            transform: translate(-50%, -50%);
            background-color: #00ff7f;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
            z-index: 2;
        }
    </style>
     <link rel="stylesheet" href="../style.css">
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
 <div class="menu-circle"><img class="image" src="../aff.jpg"></div>
 
    <div class="">
        <form class="search-bar" action="Rapport.php" method="POST">
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
     <form method="get" action="../direction.php">
        <button class="btnPe" type="submit">Direction</button>
    </form>
    <br><br>
     <form method="get" action="../pedagogie.php">
          <button class="btnPe active" type="submit">Pédagogie</button>
      </form>
      <br><br>
    <form method="get" action="">
        <button class="btnPe" type="submit">Bibliothèque</button>
    </form>
    <br><br>
    <form method="get" action="../logistique.php">
        <button class="btnPe" type="submit">Logistique</button>
    </form>
    <form method="get" action="../index.php">
        <button class="image-button" type="submit" name="logout"></button>
        
    </form>
    </div>
   </div>
  </div>
  <div class="main-container">
   <div class="main-header">
   
    <div class="header-menu">
     <a class="main-header-link " href="../pedagogie.php">Eleves</a>
     <a class="main-header-link" href="../Adherent.php">Adherant</a>     
     <a class="main-header-link" href="../Cours.php">Cours</a>
     <a class="main-header-link" href="../examen.php">Examen</a>
     <a class="main-header-link" href="../Salles.php">Salles</a>
     <a class="main-header-link  is-active" href="Rapport.php">Rapport</a>
     <a class="main-header-link" href="/Gestion_des_eleves/presence par niveau/Presence.php">Presence</a>
     <a class="main-header-link" href="../StatNiveau.php">Statistique par Niveau</a>
    </div>
   </div>
   <div class="content-wrapper">
   <h1 style="text-align: center;">Insertion dans le Cahier de Texte</h1>
     <div class="container-items">  
       
        <div class="container-rapport">
            <form action="inserer.php" method="POST">
                <div>
                    <div class="labInputRapport">
                       <label class="form-label">Nom du Professeur:</label>
                       <input type="text" class="form-control" name="nom_prof" required>
                    </div>

                    <div class="labInputRapport">
                        <label class="form-label">Niveau de l'Élève:</label>
                        <input type="text" class="form-control" name="lib_Niveau" required>
                    </div>

                    <div class="labInputRapport">
                        <label class="form-label">Salle:</label>
                        <input type="text" class="form-control" name="salle" required>
                    </div>

                    <div class="labInputRapport">
                        <label class="form-label">Date:</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>

                    <div class="labInputRapport">
                        <label class="form-label">Description:</label>
                        <textarea class="" name="description" rows="8" style="width: 500px; resize: vertical; border-radius: 5px;" placeholder="Ecrire une texte" required></textarea>

                    </div>
                        <div class="buttons">
                            <button class="blob-btn" type="submit">
                                Inserer
                                    <span class="blob-btn__inner">
                                    <span class="blob-btn__blobs">
                                        <span class="blob-btn__blob"></span>
                                        <span class="blob-btn__blob"></span>
                                        <span class="blob-btn__blob"></span>
                                        <span class="blob-btn__blob"></span>
                                    </span>
                                    </span>
                                </button>
                                

                               
                        </div>
                </div>
            </form>
        </div>

        <div class="cahier-texte">
            <h1 style="text-align: center;">Cahier de Texte</h1>
                <?php
                if (isset($_GET['success']) && $_GET['success'] == 1) {
                    // Afficher l'effet de fond sombre et l'alerte
                    echo '<div class="overlay"></div>';
                    echo '<div class="alert-box">';
                    echo '<p>Les données ont été insérées avec succès.</p>';
                    echo '</div>';
                }
                ?>
            <table border="1">
                <tr>
                    <th>Nom du Professeur</th>
                    <th>Niveau de l'Élève</th>
                    <th>Salle</th>
                    <th>Date</th>
                    <th>Description</th>
                </tr>
                <?php
                // Connexion à la base de données (à personnaliser)
                try {
                    require('../db_conn.php'); // Incluez ici votre fichier de connexion PDO
                    // Requête SQL pour récupérer les données
                    $sql = "SELECT * FROM cahiers order by id DESC";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if (!empty($result)) {
                        foreach ($result as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['nom_prof'] . "</td>";
                            echo "<td>" . $row['lib_Niveau'] . "</td>";
                            echo "<td>" . $row['salle'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Aucune entrée trouvée</td></tr>";
                    }
                } catch (PDOException $e) {
                    echo "Erreur de base de données : " . $e->getMessage();
                }
                ?>
            
            </table>
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
    </div>   
</div>
  </div>
 </div>
 <div class="overlay-app"></div>
</div>
<!-- partial -->
    <script>
        // Fermer l'alerte après 4 secondes
        setTimeout(function() {
            document.querySelector('.overlay').style.display = 'none';
            document.querySelector('.alert-box').style.display = 'none';
        }, 3000);
        
        // Fermer l'alerte lorsque l'utilisateur clique en dehors de celle-ci
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('overlay')) {
                document.querySelector('.overlay').style.display = 'none';
                document.querySelector('.alert-box').style.display = 'none';
            }
        });
    </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="../script.js"></script>

</body>
</html>
