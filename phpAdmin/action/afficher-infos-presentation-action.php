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

    $xml->presentation = isset($_POST['presentation']) ? $_POST['presentation'] : '';
    $xml->tarifs->semaineMoyenneSaison = isset($_POST['tarif_semaine_moyenne']) ? $_POST['tarif_semaine_moyenne'] : '';
    $xml->tarifs->nuiteeMoyenneSaison = isset($_POST['tarif_nuitee_moyenne']) ? $_POST['tarif_nuitee_moyenne'] : '';
    $xml->tarifs->semaineHauteSaison = isset($_POST['tarif_semaine_haute']) ? $_POST['tarif_semaine_haute'] : '';
    $xml->tarifs->nuiteeHauteSaison = isset($_POST['tarif_nuitee_haute']) ? $_POST['tarif_nuitee_haute'] : '';
    $xml->datesOuverture->dateDebut = isset($_POST['date_debut']) ? $_POST['date_debut'] : '';
    $xml->datesOuverture->dateFin = isset($_POST['date_fin']) ? $_POST['date_fin'] : '';
    echo $xml;
    $xml->asXML($filePath);

    $informations = json_decode(json_encode((array) $xml), 1);

    echo json_encode($informations);
}
?>
