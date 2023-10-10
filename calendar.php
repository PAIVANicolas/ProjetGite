<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="./css/rules.css">
    <link rel="stylesheet" type="text/css" href="./css/informationsLocation.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css"/>
    <link rel="stylesheet" type="text/css" href="./css/footer.css"/>
    <title>Calendrier</title>
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
<?php include_once("header.php"); ?>
<?php include_once("navAdmin.php"); ?>


<div id='calendar'></div>

<?php include_once("footer.php"); ?>
</body>
</html>