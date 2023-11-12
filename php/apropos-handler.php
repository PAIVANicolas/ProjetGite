<?php
// about-handler.php
header('Content-Type: application/json');


$content = [
    'content' => '<h1>À propos de nous</h1><p>Informations détaillées sur notre gîte...</p>'
];

echo json_encode($content);
?>
