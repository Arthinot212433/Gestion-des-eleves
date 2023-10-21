<?php
include "db_conn.php";
$id_Adh = $_GET['id_Adh'];

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    // L'utilisateur a confirmé la suppression
    $sql = "DELETE FROM `adherent` WHERE id_Adh = :id_Adh";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_Adh', $id_Adh, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: Adherent.php?msg=supprimer avec succès");
    } else {
        echo "failed: " . $stmt->errorInfo()[2];
    }
} else {
    // Afficher une boîte de dialogue de confirmation
    echo "<script>
            if (confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) {
                window.location.href = 'suprimer_adherent.php?id_Adh=$id_Adh&confirm=yes';
            } else {
                window.location.href = 'Adherent.php';
            }
          </script>";
}
?>
