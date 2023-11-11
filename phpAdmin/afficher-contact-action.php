<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/bdd/config.php");

header('Content-Type: application/json');

$filePath = '/ProjetGite/assets/xml/contact.xml';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $facebook = $_POST['facebook'];

    if (file_exists($filePath)) {
        $xml = simplexml_load_file($filePath);
    } else {
        $xml = new SimpleXMLElement('<contacts></contacts>');
    }

    if (!empty($email)) {
        $xml->email = $email;
    }
    if (!empty($phone)) {
        $xml->phone = $phone;
    }
    if (!empty($facebook)) {
        $xml->facebook = $facebook;
    }

    $xml->asXML($filePath);


    $contact = json_decode(json_encode((array) $xml), 1);


    echo json_encode($contact);
}
?>
