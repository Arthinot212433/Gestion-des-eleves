<?php
require('db_conn.php');

$sql = "SELECT * FROM `inscrieleve`";
$stmt = $conn->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit '])) {
    $search = $_POST['search'];

    $sql = "SELECT * FROM `inscrieleve` WHERE id_InscriEleve LIKE '%$search%'";
    $stmt = $conn->prepare($sql);
 
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
 


