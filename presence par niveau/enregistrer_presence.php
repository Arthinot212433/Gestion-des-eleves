<?php
// Inclure le fichier de connexion à la base de données
require('../db_conn.php');

if (isset($_POST['enregistrer'])) {
    // Récupération de la date de présence à partir du formulaire
    $date_presence = isset($_POST['date_presence']) ? $_POST['date_presence'] : date("Y-m-d"); // Utilisez la date actuelle si aucune date n'est spécifiée

    // Vérification si la sélection de présence a été faite pour au moins un élève
    if (isset($_POST['present']) && is_array($_POST['present'])) {
        foreach ($_POST['present'] as $id_eleve => $presence) {
            // Préparation de la requête SQL pour insérer la présence
            $sql_insert_presence = "INSERT INTO presence_eleves (id_Adh, date_presence, present) VALUES (:id_eleve, :date_presence, :present)";
            $stmt_insert_presence = $conn->prepare($sql_insert_presence);
            
            // Liaison des paramètres
            $stmt_insert_presence->bindParam(':id_eleve', $id_eleve);
            $stmt_insert_presence->bindParam(':date_presence', $date_presence);
            $stmt_insert_presence->bindParam(':present', $presence);
            
            // Exécution de la requête
            if ($stmt_insert_presence->execute()) {
                echo "Présence enregistrée avec succès pour l'élève avec l'ID " . $id_eleve . " le " . $date_presence . " (Présent : " . $presence . ")<br>";
            } else {
                echo "Erreur lors de l'enregistrement de la présence pour l'élève avec l'ID " . $id_eleve . "<br>";
            }
        }
    } else {
        echo "Aucun élève sélectionné pour enregistrer la présence.";
    }
} else {
    echo "Veuillez soumettre le formulaire correctement.";
}
?>
