<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/bdd/config.php");

header('Content-Type: application/json');

$filePath = $_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/xml/home.xml";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $presentation = $_POST['presentation'];
    $tarifSemaineMoyenne = $_POST['tarif_semaine_moyenne'];
    $tarifNuiteeMoyenne = $_POST['tarif_nuitee_moyenne'];
    $tarifSemaineHaute = $_POST['tarif_semaine_haute'];
    $tarifNuiteeHaute = $_POST['tarif_nuitee_haute'];
    $dateDebut = $_POST['date_debut'];
    $dateFin = $_POST['date_fin'];

    if (file_exists($filePath)) {
        $xml = simplexml_load_file($filePath);
    } else {
        $xml = new SimpleXMLElement('<informations></informations>');
    }

    if (!empty($presentation)) {
        $xml->presentation = $presentation;
    }
    if (!empty($tarifSemaineMoyenne)) {
        $xml->tarifs->semaineMoyenneSaison = $tarifSemaineMoyenne;
    }
    if (!empty($tarifNuiteeMoyenne)) {
        $xml->tarifs->nuiteeMoyenneSaison = $tarifNuiteeMoyenne;
    }
    if (!empty($tarifSemaineHaute)) {
        $xml->tarifs->semaineHauteSaison = $tarifSemaineHaute;
    }
    if (!empty($tarifNuiteeHaute)) {
        $xml->tarifs->nuiteeHauteSaison = $tarifNuiteeHaute;
    }
    if (!empty($dateDebut)) {
        $xml->datesOuverture->dateDebut = $dateDebut;
    }
    if (!empty($dateFin)) {
        $xml->datesOuverture->dateFin = $dateFin;
    }

    $xml->asXML($filePath);

    $informations = json_decode(json_encode((array) $xml), 1);

    echo json_encode($informations);
}
?>
