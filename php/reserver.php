<?php
require('./assets/bdd/config.php');

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
                 header("Location: ./index.php");
            } else {
                $message = "Erreur lors de la soumission de la réservation: " . $stmt->error;
            }
        }
    }
    if(isset($_POST['cancelForm'])) {
        header("Location: ./index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <title>Réservation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="./css/rules.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css"/>
    <link rel="stylesheet" type="text/css" href="./css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="./css/reserverform.css">
</head>




<body>
<?php include_once("./php/header.php"); ?>


<form action="" method="POST" class="reservation-form">

    <div class="form-group">
        <label for="clientName" class="form-label">Nom:</label>
        <input type="text" id="clientName" name="client_name" class="form-input"  placeholder="Nom" >
    </div>

    <div class="form-group">
        <label for="clientSurname" class="form-label">Prénom :</label>
        <input type="text" id="clientSurname" name="client_surname" class="form-input"  placeholder="Prénom" >
    </div>

    <div class="form-group">
        <label for="startDate" class="form-label">Date de Début:</label>
        <input type="date" id="startDate" name="start_date" class="form-input" >
    </div>

    <div class="form-group">
        <label for="endDate" class="form-label">Date de Fin:</label>
        <input type="date" id="endDate" name="end_date" class="form-input" disabled="true" >
    </div>

    <div class="form-group">
        <label for="clientEmail" class="form-label">Email:</label>
        <input type="email" id="clientEmail" name="client_email" class="form-input" >
    </div>

    <div class="form-group">
        <label for="clientPhone" class="form-label">Téléphone:</label>
        <input type="tel" id="clientPhone" name="client_phone" class="form-input">
    </div>

    <div class="button-group">
        <button type="submit" name="submitForm"  class="submit" onclick="sendEmail()">Soumettre la Réservation</button>
        <button type="cancel" name="cancelForm" class="cancel">Annuler</button>


    </div>

    <div class="messageErreur">
        <?php if ($message) {
            echo "<p class='message'>$message</p>";
        }?>
    </div>


</form>

</body>
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


    function sendEmail() {
        <?php if ($isFormValid): ?>
        let clientName = document.getElementById('clientName').value;


        let clientSurname = document.getElementById('clientSurname').value;


        let startDate = document.getElementById('startDate').value;


        let endDate = document.getElementById('endDate').value;


        let clientEmail = document.getElementById('clientEmail').value;


        let clientPhone = document.getElementById('clientPhone').value;


        let subject = "Réservation du " + startDate + " au " + endDate;

        let body = "Bonjour,\n\n" +
            "Je souhaite effectuer une réservation pour les dates du " + startDate + " au " + endDate + ".\n\n" +
            "Voici mes coordonnées :\n" +
            "Nom : " + clientName + " Prénom : " + clientSurname + "\n" +
            "Email : " + clientEmail + "\n" +
            "Téléphone : " + clientPhone + "\n\n" +
            "Cordialement,\n" +
            clientName + " " + clientSurname;
        window.location.href = "mailto:mkltr@gmail.com?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);

        <?php endif; ?>
    }

</script>
</html>
