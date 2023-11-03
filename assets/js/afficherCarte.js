document.getElementById('loadMapButton').addEventListener('click', function() {
    var mapContainer = document.getElementById('map');
    var button = document.getElementById('loadMapButton');

    if (!window.mapLoaded) {
        loadLeafletScript();
        window.mapLoaded = true;
        button.textContent = 'Masquer la Carte';
        mapContainer.style.display = 'block';
    } else {
        if (mapContainer.style.display === 'none') {
            mapContainer.style.display = 'block';
            button.textContent = 'Masquer la Carte';
        } else {
            mapContainer.style.display = 'none';
            button.textContent = 'Afficher la Carte';
        }
    }
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