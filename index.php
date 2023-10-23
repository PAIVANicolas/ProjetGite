
<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez notre Gîte, une maison en pierre, située sur les hauteurs, entre vignes, falaises et le causse qui vous séduira par sa vue magnifique et son environnement agréable.">
    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="./assets/css/rules.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/informationsLocation.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/map.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/carrousel.css"/>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Gîte Figuiès -Maison en Pierre sur les Hauteurs avec Vue Magnifique</title>
</head>
<body>
<?php include_once("./php/header.php"); ?>
<?php include_once("./php/nav.php"); ?>
<?php include_once("./php/carrousel.php"); ?>

<?php include_once("./php/informationsLocation.php"); ?>

<div class="container-map">
    <div id="map"></div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="./assets/js/map.js"></script>
</div>

<?php include_once("./php/footer.php"); ?>

<script src="./assets/js/mode.js"></script>
<script src="./assets/js/carrousel.js"></script>
<script src="./assets/js/afficher-info.js"></script>

</body>

</html>