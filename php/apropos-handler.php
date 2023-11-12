<?php
// about-handler.php
header('Content-Type: application/json');

// Exemple de contenu, à remplacer par vos données réelles
$content = [
    'content' => '<h1>À propos de nous</h1><p>Informations détaillées sur notre gîte...</p>'
];

echo json_encode($content);
?>
