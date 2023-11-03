<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/phpAdmin/connectionCheck.php"); ?>
    <link rel="icon" href="/ProjetGite/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/rules.css">
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/calendar.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/toggle.css"/>
    <title>Calendrier</title>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>

    <?php require($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/bdd/config.php");?>


    <script>
        <?php
        if (isset($events)){
        echo "var eventsData = " . json_encode($events) . ";";}
        else{
            echo "var eventsData = " . json_encode(null) . ";";
        }?>
    </script>
    <script src="/ProjetGite/assets/js/fullCalendar.js"></script>

</head>
<body>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/header.php"); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/navAdmin.php"); ?>
<div class="content-wrapper">
    <div id='calendar'></div>
    <div class="tableau-reservations">
        <table>
            <thead>
            <tr>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Nom du client</th>
                <th>Prénom du client</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/phpAdmin/afficher_demandes_reservation.php");?>
            </tbody>
        </table>
    </div>
</div>
<script src="/ProjetGite/assets/js/calendrierReservations.js"></script>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/footer.php"); ?>
</body>
</html>
