<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/bdd/config.php");

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['submitForm'])) {
        $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
        $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : null;
        $client_name = isset($_POST['client_name']) ? $_POST['client_name'] : null;
        $client_surname = isset($_POST['client_surname'])?$_POST['client_surname'] : null;
        $client_email = isset($_POST['client_email']) ? $_POST['client_email'] : null;
        $client_phone = isset($_POST['client_phone']) ? $_POST['client_phone'] : null;
        $current_date = date("Y-m-d");


        $isValidStartDate = DateTime::createFromFormat('Y-m-d', $start_date) !== false;
        $isValidEndDate = DateTime::createFromFormat('Y-m-d', $end_date) !== false;


        if (!$start_date || !$end_date || !$client_name || !$client_email || !$client_phone || !$client_surname) {
            $message = "Veuillez remplir tous les champs obligatoires.";
        } elseif (!$isValidStartDate || $start_date < $current_date) {
            $message = "La date de début est invalide ou antérieure à la date d'aujourd'hui";
        } elseif (!$isValidEndDate || $end_date <= $start_date) {
            $message = "La date de fin est invalide ou elle est antérieure ou égale à la date de début.";
        } else {

            $stmt = $conn->prepare("INSERT INTO `reservations` (start_date, end_date, client_name, client_email, client_phone, status, client_surname) VALUES (?, ?, ?, ?, ?, 'en attente',?)");


            $stmt->bind_param("ssssss", $start_date, $end_date, $client_name, $client_email, $client_phone,$client_surname);


            if ($stmt->execute()) {
                $isFormValid = true;
                header("Location: ../index.php");
            } else {
                $message = "Erreur lors de la soumission de la réservation: " . $stmt->error;
            }
        }
    }
    if(isset($_POST['cancelForm'])) {
        header("Location: ../index.php");
        exit();
    }
}
?>