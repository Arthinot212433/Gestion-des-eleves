<?php
require('db_conn.php');
$id_InscriEleve = $_GET['id_InscriEleve'];

// Vérifie si le formulaire a été soumis
if(isset($_POST['submit'])) {
    $id_InscriEleve = $_POST['id_InscriEleve'];  
    $id_Adh = $_POST['id_Adh'];
    $date_InscriEleve = $_POST['date_InscriEleve'];
    $id_Cours = $_POST['id_Cours'];
    $lib_Niveau = $_POST['lib_Niveau'];

    try {
        // Requête de mise à jour des données de l'élève
        $sql = "UPDATE `inscrieleve` SET `id_Adh`=?, `date_InscriEleve`=?, `id_Cours`=?, `lib_Niveau`=? WHERE id_InscriEleve=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_Adh, $date_InscriEleve, $id_Cours, $lib_Niveau, $id_InscriEleve]);

        // Redirige vers la page d'index avec un message de succès
        header("Location: pedagogie.php?msg=Modifier avec succès");
    } catch (PDOException $e) {
        echo "Failed: " . $e->getMessage();
    }
}

// Récupère les informations de l'élève à partir de la base de données
$sql_select_eleve = "SELECT * FROM inscrieleve WHERE id_InscriEleve = :id_InscriEleve LIMIT 1";
$stmt_select_eleve = $conn->prepare($sql_select_eleve);
$stmt_select_eleve->bindParam(':id_InscriEleve', $id_InscriEleve, PDO::PARAM_INT);
$stmt_select_eleve->execute();
$row = $stmt_select_eleve->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
      <meta charset="UTF-8">
      <title>CodePen - Glassmorphism Creative Cloud App Redesign</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="./style.css">
      <!-- Inclure Font Awesome depuis un CDN -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
<!-- partial:index.partial.html -->
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
            </div>
        </div>
 <div class="wrapper">
 <div class="left-side">
                <div class="side-wrapper">
                    <div class="side-menu">
                        <h3>Département</h3>  
                        <br><br>
                        <form method="get" action="direction.php">
                            <button class="btnPe" type="submit" style="width: 150px;">Direction</button>
                        </form>
                        <br><br>
                        <form method="get" action="pedagogie.php">
                            <button class="btnPe active" type="submit" style="width: 150px;">Pédagogie</button>
                        </form>
                        <br><br>
                        <form method="get" action="">
                            <button class="btnPe" type="submit" style="width: 150px;">Bibliothèque</button>
                        </form>
                        <br><br>
                        <form method="get" action="logistique.php">
                            <button class="btnPe" type="submit" style="width: 150px;">Logistique</button>
                        </form>
                        <form method="get" action="index.php">
                            <button class="image-button" type="submit" name="logout"></button>
                            
                        </form>
                    </div>
                </div>
            </div>
  <div class="main-container">
   <div class="main-header">
    <!-- <a class="menu-link-main" href="#">Modification des Eleves</a> -->
    <div class="header-menu">
    <a class="main-header-link is-active" href="pedagogie.php">Eleves</a>
            <a class="main-header-link" href="Adherent.php">Adherant</a>                       
            <a class="main-header-link" href="Cours.php">Cours</a>
            <a class="main-header-link" href="Examen.php">Examen</a>
            <a class="main-header-link" href="Salles.php">Salles</a>
            <a class="main-header-link" href="/Gestion_des_eleves/Rapport/Rapport.php">Rapport</a>
            <a class="main-header-link" href="/Gestion_des_eleves/presence par niveau/Presence.php">Presence</a>
            <a class="main-header-link" href="StatNiveau.php">Statistique par Niveau</a>

    </div>
   </div>
   <div class="content-wrapper">
     
        <div class="container-items-eleve">
            <form action="" method="post">
                <div class="row mb-3">
                    <div class="labInput">
                        <label class="form-label">N°Eleve:</label>
                        <input type="number" class="form-control" name='id_InscriEleve' value="<?php echo $row['id_InscriEleve'] ?>" readonly>
                    </div> 

                    <div class="labInput">
                        <label class="form-label">N°Adherent:</label>
                        <input type="text" class="form-control" name='id_Adh' value="<?php echo $row['id_Adh'] ?>" readonly>
                    </div>

                    <div class="labInput">
                        <label class="form-label">Date:</label>
                        <input type="date" class="form-control" name='date_InscriEleve' value="<?php echo $row['date_InscriEleve'] ?>">
                    </div>

                    <div class="labInput">
                        <label class="form-label">Cours:</label>
                        <select class="form-control" name="id_Cours">
                            <optgroup label="Cours">
                                <?php
                                    $sql_cours = "SELECT id_Cours, nom_Cours FROM cours";
                                    $stmt_cours = $conn->query($sql_cours);
                                    while ($row_cours = $stmt_cours->fetch(PDO::FETCH_ASSOC)) { 
                                        $selected = ($row_cours['id_Cours'] == $row['id_Cours']) ? 'selected' : '';
                                ?>
                                    <option value="<?= $row_cours['id_Cours']; ?>" <?= $selected; ?>><?= $row_cours['nom_Cours']; ?></option>
                                <?php } ?>
                            </optgroup>
                        </select>
                    </div>
                    
                    <div class="labInput">
                        <label class="form-label">Niveau:</label>
                        <select class="form-control" name="lib_Niveau">
                            <optgroup label="Niveau">
                                <?php
                                    $sql_niveau = "SELECT lib_Niveau FROM niveau";
                                    $stmt_niveau = $conn->query($sql_niveau);
                                    while ($row_niveau = $stmt_niveau->fetch(PDO::FETCH_ASSOC)) { 
                                        $selected = ($row_niveau['lib_Niveau'] == $row['lib_Niveau']) ? 'selected' : '';
                                ?>
                                    <option value="<?= $row_niveau['lib_Niveau']; ?>" <?= $selected; ?>><?= $row_niveau['lib_Niveau']; ?></option>
                                <?php } ?>
                            </optgroup>
                        </select>
                    </div>
                    
                        <div>
                            <button type="submit" class="btn btn-success" name="submit">Modifier</button>
                            <a href="pedagogie.php" class="btn btn-danger">Annuler</a>
                        </div>    
                </div>         
            </form>
        </div>
   </div>
  </div>
 </div>
 <div class="overlay-app"></div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
