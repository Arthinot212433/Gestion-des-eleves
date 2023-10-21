<?php
include "db_conn.php";
$id_InscriEleve = $_GET['id_InscriEleve'];

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    // L'utilisateur a confirmé la suppression
    $sql = "DELETE FROM `inscrieleve` WHERE id_InscriEleve = :id_InscriEleve";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_InscriEleve', $id_InscriEleve, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: pedagogie.php?msg=supprimer avec succès");
    } else {
        echo "failed: " . $stmt->errorInfo()[2];
    }
} else {
    // Afficher une boîte de dialogue de confirmation
    echo "<script>
            if (confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) {
                window.location.href = 'suprimer_eleve.php?id_InscriEleve=$id_InscriEleve&confirm=yes';
            } else {
                window.location.href = 'pedagogie.php';
            }
          </script>";
}
?>
