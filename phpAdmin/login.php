<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/ProjetGite/favicon.ico"/>
    <link rel="stylesheet" href="/ProjetGite/assets/css/loginform.css">
</head>
<body>
<form id="loginForm" class="box" method="post" name="login">
    <div class="cadreLogin">
        <h2 class="title">Se connecter</h2>
        <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
        <input type="password" class="box-input" name="password" placeholder="Mot de passe">
        <input type="submit" value="Connexion " name="submit" class="box-button">
        <button type="button" name="cancel" id="cancelButton">Vision des utilisateurs</button>
        <input type="submit" value="Modifier mot de passe " id="ModifPasswd" class="box-button">
    </div>
    <?php if (!empty($message)) { ?>
        <p class="errorMessage"><?php echo $message; ?></p>
    <?php } ?>
</form>

<script src="/ProjetGite/assets/js/login.js"></script>
</body>
</html>
