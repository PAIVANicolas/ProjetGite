<?php
require('../assets/bdd/config.php');
session_start();

if (isset($_POST['id'], $_POST['status'], $_POST['start_time'], $_POST['end_time'])) {

    $id = $_POST['id'];
    $status = $_POST['status'];
    $startTime = $_POST['start_time'];
    $endTime = $_POST['end_time'];

    echo $startTime +" "+$endTime;
    $sql = "UPDATE reservations SET status=?";

    if ($startTime && $endTime) {
        $sql .= ", start_date=CONCAT(DATE(start_date), ' ', ?), end_date=CONCAT(DATE(end_date), ' ', ?)";
    }

    $sql .= " WHERE id=?";

    $stmt = $conn->prepare($sql);

    if ($startTime && $endTime) {
        $stmt->bind_param("sssi", $status, $startTime, $endTime, $id);
    } else {
        $stmt->bind_param("si", $status, $id);
    }

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
