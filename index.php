
<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez notre Gîte, une maison en pierre, située sur les hauteurs, entre vignes, falaises et le causse qui vous séduira par sa vue magnifique et son environnement agréable.">
    <meta name="keywords" content="Gîte gite gîte conques concques Conques Concques Marcillac Marcilac marcillac marcilac maison en pierre  ">
    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="./assets/css/rules.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/informationsLocation.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/nav.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/toggle.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/footer.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/map.css"/>
    <link rel="stylesheet" type="text/css" href="./assets/css/carrousel.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Gîte Figuiès - Maison en Pierre sur les Hauteurs avec Vue Magnifique</title>
</head>
<body>
<?php include_once("./php/header.php"); ?>
<?php include_once("./php/nav.php"); ?>
<?php include_once("./php/carrousel.php"); ?>

<?php include_once("./php/informationsLocation.php"); ?>

<div class="container-map">
    <div id="map" style="display:none;"></div>
    <button id="loadMapButton">Afficher la Carte</button>
</div>

<?php include_once("./php/footer.php"); ?>

<script src="./assets/js/mode.js"></script>
<script src="./assets/js/carrousel.js"></script>
<script src="./assets/js/afficher-info.js"></script>

</body>

</html>

<script>
    document.getElementById('loadMapButton').addEventListener('click', function() {
        if (!window.mapLoaded) {
            loadLeafletScript();
            window.mapLoaded = true;
        }
        document.getElementById('map').style.display = 'block';
    });

    function loadLeafletScript() {
        var script = document.createElement('script');
        script.src = 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js';
        script.onload = initializeMap;
        document.head.appendChild(script);
    }


    function initializeMap() {
        var map = L.map('map').setView([44.449001, 2.493300], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([44.449001, 2.493300])
            .addTo(map)
            .bindPopup("<b>Gîte Figuiès</b><br>140 rue de Figuiès<br>12330 Salles-la-Source");

        map.locate({setView: false, maxZoom: 16});
        map.on('locationfound', function(e) {
            L.marker(e.latlng).addTo(map)
                .bindPopup("Vous êtes ici !").openPopup();
        });
    }

</script>