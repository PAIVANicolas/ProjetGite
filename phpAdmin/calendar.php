<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../phpAdmin/connectionCheck.php"); ?>
    <link rel="icon" href="../favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../assets/css/rules.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/calendar.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/footer.css"/>
    <title>Calendrier</title>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>


    <?php
        require('../assets/bdd/config.php');
        include_once ("../phpAdmin/afficher-reservations-calendrier.php");
    ?>

    <script src="../assets/js/fullCalendar.js"></script>
    <script>
        <?php echo "var eventsData = " . json_encode($events) . ";"; ?>
    </script>
</head>


<body>
<?php include_once("../php/header.php"); ?>
<?php include_once("../phpAdmin/navAdmin.php"); ?>
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
            <?php include_once ("../phpAdmin/afficher_demandes_reservation.php");?>
            </tbody>
        </table>
    </div>
</div>

<script>
    async function refreshTable() {
        try {
            let responseTable = await fetch('../phpAdmin/afficher_demandes_reservation.php');
            let responseCalendar = await fetch('../phpAdmin/afficher-reservations-calendrier.php');
            if (!responseTable.ok) {
                throw new Error('Network response was not ok ' + responseTable.statusText);
            }
            let data = await responseTable.text();
            let eventsData = await responseCalendar.json();

            document.querySelector('.tableau-reservations tbody').innerHTML = data;
            calendar.removeAllEvents();
            eventsData.forEach(event => {
                calendar.addEvent(event);
            });
        } catch (error) {
            console.error('Erreur lors de la récupération des réservations pour');
        }
    }

    setInterval(refreshTable, 5000);
</script>
<script src="../assets/js/calendrierReservations.js"></script>
<?php include_once("../php/footer.php"); ?>
</body>
</html>
