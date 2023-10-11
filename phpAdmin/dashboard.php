<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("connectionCheck.php"); ?>
    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="./assets/css/rules.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/informationsLocation.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/footer.css"/>
    <title>Tableau de bord</title>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });

    </script>
</head>

<body>

<?php include_once("./php/header.php"); ?>
<?php include_once("./phpAdmin/navAdmin.php"); ?>



<?php include_once("./php/footer.php"); ?>
</body>
</html>