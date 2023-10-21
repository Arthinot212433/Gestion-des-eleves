<?php
// Inclure le fichier de connexion à la base de données
require('../db_conn.php');

if (isset($_POST['enregistrer'])) {

    // Vérification si la sélection de présence a été faite pour au moins un élève
    if (isset($_POST['present']) && is_array($_POST['present'])) {
        foreach ($_POST['present'] as $nom => $presence) {
            // Préparation de la requête SQL pour insérer la présence
            $sql_insert_presence = "INSERT INTO pointage (nom, present) VALUES (:nom, :present)";
            $stmt_insert_presence = $conn->prepare($sql_insert_presence);
            
            $stmt_insert_presence->bindParam(':nom', $nom);
            $stmt_insert_presence->bindParam(':present', $presence);
            
            // Exécution de la requête
            if ($stmt_insert_presence->execute()) {
                echo "Présence enregistrée avec succès pour" . $nom . " (Présent : " . $presence . ")<br>";
            } else {
                echo "Erreur lors de l'enregistrement de la présence pour " . $nom . "<br>";
            }
        }
    } else {
        echo "Aucun prof sélectionné pour enregistrer la présence.";
    }
} else {
    echo "Veuillez soumettre le formulaire correctement.";
}
?>
