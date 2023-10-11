<?php
require('../assets/bdd/config.php');
session_start();
if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $hashedPassword = hash('sha256', $_POST['password']);


    $stmt = $conn->prepare("SELECT * FROM `Utilisateur` WHERE identifiant = ? AND password = ?");
    $stmt->bind_param("ss", $username, $hashedPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    $rows = $result->num_rows;

    if ($rows == 1) {
        session_regenerate_id();  // Régénération de l'ID de session
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $message = "Le mot de passe ou le nom d'utilisateur est incorrect.";
    }
}
?>