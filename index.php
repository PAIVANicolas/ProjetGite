
<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez notre Gîte, une maison en pierre, située sur les hauteurs, entre vignes, falaises et le causse qui vous séduira par sa vue magnifique et son environnement agréable.">
    <meta name="keywords" content="Gîte gite gîte conques concques Conques Concques Marcillac Marcilac marcillac marcilac maison en pierre  ">
    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/rules.css">
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/informationsLocation.css">
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/toggle.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/map.css"/>
    <link rel="stylesheet" type="text/css" href="/ProjetGite/assets/css/carrousel.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Gîte Figuiès - Maison en Pierre sur les Hauteurs avec Vue Magnifique</title>
</head>
<body>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/header.php"); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/nav.php");?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/php/carrousel.php"); ?>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/php/informationsLocation.php"); ?>

<div class="container-map" >
    <div id="map" style="display:none;"></div>
    <button id="loadMapButton">Afficher la Carte</button>
</div>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/includes/footer.php"); ?>

<script src="/ProjetGite/assets/js/mode.js"></script>
<script src="/ProjetGite/assets/js/carrousel.js"></script>
<script src="/ProjetGite/assets/js/afficher-info.js"></script>
<script src="/ProjetGite/assets/js/afficherCarte.js"></script>

</body>

</html>

