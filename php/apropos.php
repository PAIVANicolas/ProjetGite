<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page À propos de notre gîte">
    <meta name="keywords" content="gîte, maison, vacances, histoire, équipe">
    <link rel="icon" href="/ProjetGite/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/rules.css">
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/toggle.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/apropos.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>À propos</title>
</head>
<body>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/header.php"); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/nav.php");?>


<section class="container-apropos">
    <div id="about-content">
        <div id="our-history" class="about-section">
            <h2>Notre Histoire</h2>
            <p>Texte décrivant l'histoire de votre gîte...</p>
        </div>
        <div id="our-team" class="about-section">
            <h2>Notre Équipe</h2>
            <p>Description de l'équipe, avec photos et biographies si disponibles...</p>
        </div>
        <div id="our-values" class="about-section">
            <h2>Nos Valeurs</h2>
            <p>Une liste de vos valeurs et principes fondamentaux...</p>
        </div>
    </div>
    <form id="formContact" class="form-contact" onsubmit="return envoyerMail()">
        <label class="form-element">Quel est votre nom ?</label>
        <input type="text" id="nomMail" name="nomMail" required>

        <label class="form-element">Sujet de votre demande ?</label>
        <input type="text" id="sujetMail" name="sujetMail" required>

        <label class="form-element">Votre demande :</label>
        <textarea id="demandeMail" name="demandeMail" required></textarea>

        <button class="btn-center" type="submit">Envoyer par mail</button>
    </form>



</section>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/footer.php"); ?>

<script src="/ProjetGite/assets/js/mode.js"></script>
<script src="/ProjetGite/assets/js/mail.js"></script>
</body>
</html>
