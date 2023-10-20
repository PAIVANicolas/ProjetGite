<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../phpAdmin/connectionCheck.php"); ?>
    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../assets/css/rules.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/carte.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/footer.css"/>
    <title>Tableau de bord</title>
</head>

<body>
    <?php include_once("../php/header.php"); ?>
    <?php include_once("../phpAdmin/navAdmin.php"); ?>


    <?php include_once("../phpAdmin/carte.php"); ?>



    <?php include_once("../php/footer.php"); ?>
    <script src="../assets/js/carte.js"></script>
</body>
</html>