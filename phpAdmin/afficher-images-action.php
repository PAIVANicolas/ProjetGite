<?php
require('../assets/bdd/config.php');
include ('../phpAdmin/cheminsImages.php');

$response = ['status' => 'error', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['section'])) {
    $section = $_POST['section'];

    $stmt = $conn->prepare("SELECT * FROM Image WHERE section = ?");
    $stmt->bind_param('s', $section);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result) {
        $images = [];
        while ($row = $result->fetch_assoc()) {
            $images[] = [
                'path' => $row['image_path'],
                'alt' => $row['image_alt'],
                'id' =>$row['Id_Image']

            ];
        }
        $response['status'] = 'success';
        $response['images'] = $images;
    } else {
        $response['message'] = 'Aucune image trouvée.';
    }
} else {
    $response['message'] = 'Requête invalide.';
}

echo json_encode($response);
?>
