<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/bdd/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $facebook = $_POST['facebook'];

    if (file_exists('contact.xml')) {
        $xml = simplexml_load_file('contact.xml');
    } else {
        $xml = new SimpleXMLElement('<contacts></contacts>');
    }

    echo $email." ".$phone;
    if (!empty($email)) {
        $xml->email = $email;
    }
    if (!empty($phone)) {
        $xml->phone = $phone;
    }
    if (!empty($facebook)) {
        $xml->facebook = $facebook;
    }

    $xml->asXML('../contact.xml');


    $contact = json_decode(json_encode((array) $xml), 1);


    echo json_encode($contact);
}
?>
