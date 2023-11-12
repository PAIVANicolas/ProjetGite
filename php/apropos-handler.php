<?php
// about-handler.php
header('Content-Type: application/json');

$filePath = $_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/xml/contact.xml";

if (file_exists($filePath)) {
    $xml = simplexml_load_file($filePath);
    if ($xml === false) {
        echo json_encode(['content' => 'Erreur lors du chargement du fichier XML']);
    } else {
        $aboutInfo = json_decode(json_encode((array) $xml), 1);
        echo json_encode(['content' => $aboutInfo]);
    }
} else {
    echo json_encode(['content' => 'Fichier XML non trouvé']);
}
?>
