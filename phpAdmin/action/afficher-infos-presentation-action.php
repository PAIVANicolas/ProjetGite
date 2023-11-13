<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/bdd/config.php");

header('Content-Type: application/json');

$filePath = $_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/xml/home.xml";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (file_exists($filePath)) {
        $xml = simplexml_load_file($filePath);
    } else {
        $xml = new SimpleXMLElement('<informations></informations>');
    }

    // Utilisation de la validation des données, similaire au deuxième script
    if (!empty($_POST['presentation'])) {
        $xml->presentation = $_POST['presentation'];
    }
    if (!empty($_POST['tarif_semaine_moyenne'])) {
        $xml->tarifs->semaineMoyenneSaison = $_POST['tarif_semaine_moyenne'];
    }
    if (!empty($_POST['tarif_nuitee_moyenne'])) {
        $xml->tarifs->nuiteeMoyenneSaison = $_POST['tarif_nuitee_moyenne'];
    }
    if (!empty($_POST['tarif_semaine_haute'])) {
        $xml->tarifs->semaineHauteSaison = $_POST['tarif_semaine_haute'];
    }
    if (!empty($_POST['tarif_nuitee_haute'])) {
        $xml->tarifs->nuiteeHauteSaison = $_POST['tarif_nuitee_haute'];
    }
    if (!empty($_POST['date_debut'])) {
        $xml->datesOuverture->dateDebut = $_POST['date_debut'];
    }
    if (!empty($_POST['date_fin'])) {
        $xml->datesOuverture->dateFin = $_POST['date_fin'];
    }


    $xml->asXML($filePath);

    $informations = json_decode(json_encode((array) $xml), 1);

    echo json_encode($informations);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (file_exists($filePath)) {
        $xml = simplexml_load_file($filePath);
        $informations = json_decode(json_encode((array) $xml), 1);
        echo json_encode($informations);
    } else {
        // Gérer l'absence du fichier ou renvoyer une réponse d'erreur.
        echo json_encode(["error" => "Fichier XML non trouvé"]);
    }
}

