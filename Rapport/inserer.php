<?php
try {
    // Connexion à la base de données (à personnaliser)
    require('../db_conn.php');

    // Récupération des données du formulaire
    $nom_prof = $_POST['nom_prof'];
    $lib_Niveau = $_POST['lib_Niveau'];
    $salle = $_POST['salle'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    // Requête SQL pour insérer les données
    $sql = "INSERT INTO cahiers (nom_prof, lib_Niveau, salle, date, description)
    VALUES (:nom_prof, :lib_Niveau, :salle, :date, :description)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nom_prof', $nom_prof);
    $stmt->bindParam(':lib_Niveau', $lib_Niveau);
    $stmt->bindParam(':salle', $salle);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':description', $description);

    if ($stmt->execute()) {
        // Redirection vers cahier_texte.php avec un paramètre d'alerte
        header("Location: Rapport.php?success=1");
        exit();
    } else {
        echo "Erreur : " . $sql . "<br>" . $stmt->errorInfo()[2];
    }

    $conn = null; // Fermer la connexion
} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
}
?>
