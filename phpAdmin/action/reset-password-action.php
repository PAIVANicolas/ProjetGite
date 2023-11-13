<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/bdd/config.php");

session_start();
if (isset($_POST['username'], $_POST['passwordActuel'])) {
    $username = $_POST['username'];
    $hashedPassword = hash('sha256', $_POST['passwordActuel']);
    $hashedPasswordNew = hash('sha256', $_POST['passwordNouveau']);


    $stmt = $conn->prepare("SELECT * FROM `utilisateur` WHERE identifiant = ? AND password = ?");
    $stmt->bind_param("ss", $username, $hashedPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    $rows = $result->num_rows;

    if ($result->num_rows == 1) {

        $updateStmt = $conn->prepare("UPDATE `utilisateur` SET password = ? WHERE identifiant = ?");
        $updateStmt->bind_param("ss", $hashedPasswordNew, $username);
        $updateStmt->execute();

        if ($updateStmt->affected_rows == 1) {
            session_regenerate_id();
            $_SESSION['username'] = $username;
            header("Location: ../dashboard.php");
            exit;
        } else {
            echo "Échec de la mise à jour du mot de passe.";
            exit;
        }
    } else {


        echo "Le mot de passe ou le nom d'utilisateur est incorrect.";
        exit;
    }
}
?>