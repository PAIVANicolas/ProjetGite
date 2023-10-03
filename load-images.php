<?php
// Répertoire contenant les images
$imageDirectory = './assets/images/carousel/'; // Assurez-vous que le chemin est correct

// Liste des noms de fichiers d'images dans le répertoire
$imageNames = [];

if (is_dir($imageDirectory)) {
    $images = glob($imageDirectory . '*.{jpg,png,gif}', GLOB_BRACE);
    
    foreach ($images as $image) {
        $imageNames[] = basename($image);
    }
}

// Envoyer la liste des noms d'images au format JSON
header('Content-Type: application/json');
echo json_encode($imageNames);
?>
