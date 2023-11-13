<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/bdd/config.php");

include($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/phpAdmin/cheminsImages.php");

$response = ['status' => 'error', 'message' => 'Une erreur s\'est produite.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $fileTmpPath = $_FILES['image']['tmp_name'];
    $fileType = exif_imagetype($fileTmpPath);

    if (false === $fileType || !in_array($fileType, [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG], true)) {
        $response['message'] = 'Type de fichier non pris en charge.';
        echo json_encode($response);
        exit;
    }

    // Définir le chemin de destination
    $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9\._]/', '', basename($_FILES['image']['name']));

    $destPath = CHEMIN_IMAGES::CHEMIN_IMAGES_CARROUSEL . '/' . $fileName;

    // Déplacer l'image vers le dossier de destination
    if (move_uploaded_file($fileTmpPath, $destPath)) {
        // Si l'image est déplacée avec succès, ajoutez son chemin à la base de données
        $stmt = $conn->prepare("INSERT INTO image (image_path, image_alt, is_featured, section) VALUES (?, ?, 'no', ?)");
        $stmt->bind_param('sss', $destPath, $_POST['image_alt'], $_POST['section']);

        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Image ajoutée avec succès.';
        }
    }

}

echo json_encode($response);
?>
