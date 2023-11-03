<?php
require('../assets/bdd/config.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['image_id'])) {
    $image_id = $_POST['image_id'];

    $stmt = $conn->prepare("DELETE FROM image WHERE Id_Image = ?");
    $stmt->bind_param("i", $image_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID de l\'image non fourni.']);
}

?>