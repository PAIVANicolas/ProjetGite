<?php
require('../assets/bdd/config.php');
include ('../phpAdmin/cheminsImages.php');
?>
<div>
    <form id="imageVisionForm">
        <div class="form-img-vision">
            <div class="form-group-vision">
                <label for="section">Section :</label>
                <select id="section" name="section">
                    <?php include ('../phpAdmin/afficher-sections-image.php');?>
                </select>
            </div>
            <button type="submit">Voir les images</button>
        </div>
    </form>

    <div class="images-container">

    </div>
</div>

<script>
    document.getElementById('imageVisionForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var section = document.getElementById('section').value;
        var formData = new FormData();
        formData.append('section', section);

        fetch('../phpAdmin/afficher-images-action.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    afficherImages(data.images);
                } else {

                    console.error(data.message);
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
    });

    function afficherImages(images) {
        let container = document.querySelector('.images-container');
        container.innerHTML = ''; // Efface les anciennes images

        images.forEach(image => {
            let img = document.createElement('img');
            img.src = image.path;
            img.alt = image.alt;
            container.appendChild(img);
        });
    }
</script>
<style>
    .images-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(400px, 1fr)); /* Ajustez la taille minimum ici */
        grid-gap: 10px; /* Espace entre les images */
        padding: 10px;
    }

    .images-container img {
        width: 400px; /* Largeur fixe */
        height: 400px; /* Hauteur fixe */
        object-fit: cover; /* Assure que les images couvrent toute la zone sans déformer */
        border-radius: 5px; /* Arrondir les coins si désiré */
    }
</style>