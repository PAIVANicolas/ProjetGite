

<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <title>Réservation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="./assets/css/rules.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/reserverform.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/toggle.css"/>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
</head>
<body>
<?php include_once("./php/header.php"); ?>

<div id="calendar">
    <script src="./assets/js/fullCalendarUser.js"></script>
</div>

<script>
    <?php
        $events = null;
    echo "var eventsData = " . json_encode($events) . ";"; ?>
</script>

<form action="./php/reserveraction.php" method="POST" class="reservation-form">

    <div class="form-group">
        <label for="clientName" class="form-label">Nom:</label>
        <input type="text" id="clientName" name="client_name" class="form-input"  placeholder="Nom" required="true" >
    </div>

    <div class="form-group">
        <label for="clientSurname" class="form-label">Prénom :</label>
        <input type="text" id="clientSurname" name="client_surname" class="form-input"  placeholder="Prénom" required="true" >
    </div>

    <div class="form-group">
        <label for="startDate" class="form-label">Date de Début:</label>
        <input type="date" id="startDate" name="start_date" class="form-input" required="true" >
    </div>

    <div class="form-group">
        <label for="endDate" class="form-label">Date de Fin:</label>
        <input type="date" id="endDate" name="end_date" class="form-input" disabled="true" required="true" >
    </div>

    <div class="form-group">
        <label for="clientEmail" class="form-label">Email:</label>
        <input type="email" id="clientEmail" name="client_email" class="form-input" required="true">
    </div>

    <div class="form-group">
        <label for="clientPhone" class="form-label">Téléphone:</label>
        <input type="tel" id="clientPhone" name="client_phone" class="form-input" required="true" placeholder="0600000000">
    </div>

    <div class="button-group">
        <button type="submit" name="submitForm"  class="submit" onclick="sendEmail()">Soumettre la Réservation</button>
        <button type="cancel" name="cancelForm" class="cancel" formnovalidate>Annuler</button>


    </div>

    <div class="messageErreur">
        <?php if (isset($message)) {
            echo "<p class='message'>$message</p>";
        }?>
    </div>


</form>

</body>

<script src="./assets/js/calendrierVisiteur.js"></script>
<<<<<<< Updated upstream
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startDateInput = document.getElementById('startDate');
        const endDateInput = document.getElementById('endDate');


        endDateInput.disabled = true;

        const today = new Date().toISOString().split('T')[0];
        startDateInput.setAttribute('min', today);


        startDateInput.addEventListener('change', function() {
            if (startDateInput.value) {

                endDateInput.disabled = false;
                endDateInput.setAttribute('min', startDateInput.value);
            } else {

                endDateInput.disabled = true;
                endDateInput.value = '';
            }
        });
    });
</script>
=======
<script src="./assets/js/mode.js"></script>
<script src="./assets/js/dateInputValidation.js"></script>
>>>>>>> Stashed changes

</html>
