<?php
// Connexion à la base de données
require('bdd/config.php');


$id = $_POST['id'];
$status = $_POST['status'];
$startTime = $_POST['start_time'];
$endTime = $_POST['end_time'];

$sql = "UPDATE reservations SET status='$status'";
if ($startTime && $endTime) {
    $sql .= ", start_date=CONCAT(DATE(start_date), ' ', '$startTime'), end_date=CONCAT(DATE(end_date), ' ', '$endTime')";
}
$sql .= " WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>