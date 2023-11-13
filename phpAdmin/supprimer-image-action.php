<?php
require('../assets/bdd/config.php');

if (isset($_POST['image_id'])) {
    $image_id = $_POST['image_id'];

    // Récupérer le chemin de l'image depuis la base de données
    $query = $conn->prepare("SELECT image_path FROM image WHERE Id_Image = ?");
    $query->bind_param("i", $image_id);
    $query->execute();
    $result = $query->get_result();

    if ($row = $result->fetch_assoc()) {
        $imagePath = $row['image_path'];

        // Supprimer l'entrée de la base de données
        $stmt = $conn->prepare("DELETE FROM image WHERE Id_Image = ?");
        $stmt->bind_param("i", $image_id);

        if ($stmt->execute()) {
            // Tenter de supprimer le fichier physique
            if (file_exists($imagePath)) {
                unlink($imagePath);
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Le fichier image n\'existe pas.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Aucune image trouvée avec cet ID.']);
    }

    $query->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID de l\'image non fourni.']);
}
?>
