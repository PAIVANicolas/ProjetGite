<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: /ProjetGite/login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/phpAdmin/connectionCheck.php"); ?>
    <link rel="icon" href="/ProjetGite/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/rules.css">
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/carte.css">
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/toggle.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/afficherImages.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/afficherContact.css"/>
    <title>Tableau de bord</title>
</head>

<body>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/header.php"); ?>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/navAdmin.php"); ?>


    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/phpAdmin/carte.php"); ?>



    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/footer.php"); ?>
    <script src="/ProjetGite/assets/js/carte.js"></script>


</body>
</html>