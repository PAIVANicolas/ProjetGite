<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("connectionCheck.php"); ?>
    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="./css/rules.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css"/>
    <link rel="stylesheet" type="text/css" href="./css/calendar.css"/>
    <link rel="stylesheet" type="text/css" href="./css/footer.css"/>
    <title>Calendrier</title>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>

    <?php
    require('bdd/config.php');
    session_start();
    $requetecalendrier = "SELECT * FROM reservations where status !='rejetée'";
    $requetetableau = "SELECT * FROM reservations where status !='confirmée'";
    $resultcalendrier = $conn->query($requetecalendrier);
    $resulttableau = $conn->query($requetetableau);
    $events = array();

    if ($resultcalendrier->num_rows > 0) {
        while($row = $resultcalendrier->fetch_assoc()) {
            $end_date = new DateTime($row["end_date"]);
            $end_date->modify('+1 day');
            $events[] = array(
                'title' => $row["client_name"] . ' ' . $row["client_surname"],
                'start' => $row["start_date"],
                'end' => $end_date->format('Y-m-d'),
                'color' => ($row["status"] == 'rejetée') ? 'red' : (($row["status"] == 'confirmée') ? 'green' : 'orange')
            );
            echo "<pre>";  // Pour formater l'affichage
            print_r($events);  // Affiche le contenu du tableau
            echo "</pre>";

        }

        $resultcalendrier->data_seek(0);  // réinitialise le curseur à la première ligne

    }
    ?>

    <script>
        var calendar;  // Make it global

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var eventsData = <?php echo json_encode($events); ?>;

            calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'fr',
                initialView: 'timeGridWeek',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay',
                    locale: 'fr'
                },
                eventOverlap: true,
                buttonText: {
                    today : 'aujourd\'hui',
                    day : 'jour',
                    month:'mois',
                    week : 'semaine',
                },
                events: eventsData
            });
            calendar.render();
        });
    </script>
</head>

<body>
<?php include_once("header.php"); ?>
<?php include_once("navAdmin.php"); ?>

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
        <?php
        if ($resulttableau->num_rows > 0) {
            while($row = $resulttableau->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["start_date"] . "</td>";
                echo "<td>" . $row["end_date"] . "</td>";
                echo "<td>" . $row["client_name"] . "</td>";
                echo "<td>" . $row["client_surname"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td>";
                echo "<button onclick='validerReservation(" . $row["id"] . ")'>Valider</button>";
                echo "<button onclick='refuserReservation(" . $row["id"] . ")'>Refuser</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Aucune réservation trouvée</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
    </table>
</div>

<script>
    function validerReservation(id) {
        var startTime = prompt("Veuillez entrer l'heure de début (format HH:mm) :");
        var endTime = prompt("Veuillez entrer l'heure de fin (format HH:mm) :");
        if (startTime && endTime) {
            updateReservation(id, 'confirmée', startTime, endTime);
        }
    }

    function refuserReservation(id) {
        updateReservation(id, 'rejetée', null, null);
    }

    function updateReservation(id, status, startTime, endTime) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_reservation.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                calendar.refetchEvents();
            }
        }
        xhr.send("id=" + id + "&status=" + status + "&start_time=" + startTime + "&end_time=" + endTime);
    }
</script>

<?php include_once("footer.php"); ?>
</body>
</html>
