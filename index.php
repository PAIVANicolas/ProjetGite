
<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="./css/rules.css">
    <link rel="stylesheet" type="text/css" href="./css/informationsLocation.css">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">

    <link rel="stylesheet" type="text/css" href="./css/header.css"/>
    <link rel="stylesheet" type="text/css" href="./css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="./css/map.css"/>
    <link rel="stylesheet" type="text/css" href="./css/carrousel.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Gîte Figuiès</title>
</head>
<body>
<?php include_once("header.php"); ?>
<?php include_once("nav.php"); ?>
<?php include_once("carrousel.php"); ?>



<?php include_once("informationsLocation.php"); ?>


<div id="map"></div>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="./js/map.js"></script>


<?php include_once("footer.php"); ?>
<script src="./js/mode.js"></script>
<script src="./js/carrousel.js"></script>


</body>




</html>