<?php
global $conn;
require($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/bdd/config.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "cc";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE from reservations WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}


$conn->close();
?>