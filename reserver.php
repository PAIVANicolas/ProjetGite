<?php
require('bdd/config.php');

$message = ""; // Pour afficher les erreurs

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
    $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : null;
    $client_name = isset($_POST['client_name']) ? $_POST['client_name'] : null;
    $client_email = isset($_POST['client_email']) ? $_POST['client_email'] : null;
    $client_phone = isset($_POST['client_phone']) ? $_POST['client_phone'] : null;
    $current_date = date("Y-m-d");


    $isValidStartDate = DateTime::createFromFormat('Y-m-d', $start_date) !== false;
    $isValidEndDate = DateTime::createFromFormat('Y-m-d', $end_date) !== false;
   

    if (!$start_date || !$end_date || !$client_name || !$client_email || !$client_phone) {
        $message = "Veuillez remplir tous les champs obligatoires.";
    } elseif (!$isValidStartDate || $start_date < $current_date) {
        $message = "La date de début est invalide ou antérieure à la date d'aujourd'hui";
    } elseif (!$isValidEndDate || $end_date <= $start_date) {
        $message = "La date de fin est invalide ou elle est antérieure ou égale à la date de début.";
    } else {

        $stmt = $conn->prepare("INSERT INTO `reservations` (start_date, end_date, client_name, client_email, client_phone, status) VALUES (?, ?, ?, ?, ?, 'en attente')");


        $stmt->bind_param("sssss", $start_date, $end_date, $client_name, $client_email, $client_phone);


        if ($stmt->execute()) {
            $message = "Réservation soumise avec succès!";
        } else {
            $message = "Erreur lors de la soumission de la réservation: " . $stmt->error;
        }
    }
}
?>
<form action="" method="POST" class="reservation-form">
    <div class="form-group">
        <label for="startDate" class="form-label">Date de Début:</label>
        <input type="date" id="startDate" name="start_date" class="form-input" required>
    </div>

    <div class="form-group">
        <label for="endDate" class="form-label">Date de Fin:</label>
        <input type="date" id="endDate" name="end_date" class="form-input" required>
    </div>

    <div class="form-group">
        <label for="clientName" class="form-label">Nom:</label>
        <input type="text" id="clientName" name="client_name" class="form-input"  placeholder="Nom Prénom" required>
    </div>

    <div class="form-group">
        <label for="clientEmail" class="form-label">Email:</label>
        <input type="email" id="clientEmail" name="client_email" class="form-input" required>
    </div>

    <div class="form-group">
        <label for="clientPhone" class="form-label">Téléphone:</label>
        <input type="tel" id="clientPhone" name="client_phone" class="form-input">
    </div>

    <button type="submit" class="submit-button">Soumettre la Réservation</button>

    <?php if ($message) {
        echo "<p class='message'>$message</p>";
    }?>
</form>
