<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("./phpAdmin/connectionCheck.php"); ?>
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
        }
        $resultcalendrier->data_seek(0);
    }
    ?>

    <script>
        var calendar;
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var eventsData = <?php echo json_encode($events); ?>;


            var toolbarOptions;
            if (window.innerWidth < 768) {
                toolbarOptions = {
                    left: 'prev,next',
                    center: 'title',
                    right: ''
                };
            } else {
                toolbarOptions = {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay',
                    locale: 'fr'
                };
            }


            calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'fr',
                initialView: 'timeGridWeek',
                headerToolbar: toolbarOptions,
                eventOverlap: true,
                buttonText: {
                    today : 'aujourd\'hui',
                    day : 'jour',
                    month:'mois',
                    week : 'semaine',
                },
                allDaySlot: false,
                events: eventsData, height: 'auto',
                contentHeight: 'auto',
                aspectRatio: 1.8,


                windowResize: function(view, element) {
                    if (window.innerWidth < 768) {
                        calendar.changeView('timeGridDay');
                    } else {
                        calendar.changeView('timeGridWeek');
                    }
                }
            });
            calendar.render();
        });


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
        console.log(startTime + endTime );
    }
</script>


<?php include_once("../php/footer.php"); ?>
</body>
</html>
