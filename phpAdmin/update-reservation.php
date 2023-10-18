<?php
require('../assets/bdd/config.php');
session_start();
echo '<script>alert("Votre message d\'alerte ici.");</script>';
if (isset($_POST['id'], $_POST['status'], $_POST['start_time'], $_POST['end_time'])) {

    $id = $_POST['id'];
    $status = $_POST['status'];
    $startTime = $_POST['start_time'];
    $endTime = $_POST['end_time'];


$overlapQuery = "SELECT id FROM reservations 
    WHERE 
    ((start_date BETWEEN CONCAT(DATE(start_date), ' ', ?) AND CONCAT(DATE(end_date), ' ', ?)) 
    OR 
    (end_date BETWEEN CONCAT(DATE(start_date), ' ', ?) AND CONCAT(DATE(end_date), ' ', ?)) 
    OR 
    (? BETWEEN start_date AND end_date) 
    OR 
    (? BETWEEN start_date AND end_date)) 
    AND id != ?";

$overlapStmt = $conn->prepare($overlapQuery);
$overlapStmt->bind_param("ssssssi", $startTime, $endTime, $startTime, $endTime, $startTime, $endTime, $id);
$overlapStmt->execute();
$overlapStmt->store_result();
    echo '<script>alert("Votre message d\'alerte ici.");</script>';
if ($overlapStmt->num_rows > 0) {
    echo '<script>alert("Votre message d\'alerte ici.");</script>';

    $overlapStmt->close();
    $conn->close();
    exit();
}

}

$conn->close();
?>
