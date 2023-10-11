<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginform.css">
</head>
<body>
<?php
require('bdd/config.php');
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
<form action="" class="box" method="post" name="login">
    <div class="cadreLogin" >
        <h2 class="title">Se connecter</h2>
        <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
        <input type="password" class="box-input" name="password" placeholder="Mot de passe">
        <input type="submit" value="Connexion " name="submit" class="box-button">
    </div>
    <?php if (! empty($message)) { ?>
        <p class="errorMessage"><?php echo $message; ?></p>
    <?php } ?>
</form>
</body>
</html>
