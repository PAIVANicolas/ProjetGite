<?php
require('../assets/bdd/config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['id'], $_POST['status'], $_POST['start_time'], $_POST['end_time'])) {

    $id = $_POST['id'];
    $status = $_POST['status'];
    $startTime = $_POST['start_time'];
    $endTime = $_POST['end_time'];

    $query = "SELECT DATE(start_date) as startDate, DATE(end_date) as endDate FROM reservations WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $existingStartDate = $row['startDate'];
    $existingEndDate = $row['endDate'];

    $stmt->close();

    $startTime = $existingStartDate . ' ' . $startTime;
    $endTime = $existingEndDate . ' ' . $endTime;


    $checkOverlapSQL = "SELECT id FROM reservations 
                        WHERE ((start_date < ? AND end_date > ?) 
                        OR (start_date < ? AND end_date > ?) 
                        OR (? BETWEEN start_date AND end_date) 
                        OR (? BETWEEN start_date AND end_date))
                        AND id != ?";

    $checkStmt = $conn->prepare($checkOverlapSQL);
    $checkStmt->bind_param("ssssssi", $endTime, $startTime, $startTime, $endTime, $startTime, $endTime, $id);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo "overlap";
        $checkStmt->close();
        $conn->close();
        exit;
    }

    $checkStmt->close();

    $sql = "UPDATE reservations SET status=?";

    if ($startTime && $endTime) {
        $sql .= ", start_date=?, end_date=?";
    }

    $sql .= " WHERE id=?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        exit;
    }

    if ($startTime && $endTime) {
        $stmt->bind_param("sssi", $status, $startTime, $endTime, $id);
    } else {
        $stmt->bind_param("si", $status, $id);
    }

    if ($stmt->execute()) {
        echo "success";
    }

    $stmt->close();
}

$conn->close();

?>
