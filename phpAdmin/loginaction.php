<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/bdd/config.php");

session_start();
if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $hashedPassword = hash('sha256', $_POST['password']);


    $stmt = $conn->prepare("SELECT * FROM `utilisateur` WHERE identifiant = ? AND password = ?");
    $stmt->bind_param("ss", $username, $hashedPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    $rows = $result->num_rows;

    if ($rows == 1) {
        session_regenerate_id();
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        http_response_code(400); // Renvoyez un statut HTTP 400 pour indiquer une requête incorrecte
        echo "Le mot de passe ou le nom d'utilisateur est incorrect.";
        exit;
    }

}
?>