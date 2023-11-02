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
        let container = document.createElement('div');
        images.forEach(image => {
            console.log(image);
            let img = document.createElement('img');
            img.src = image.path;
            img.alt = image.alt;
            container.appendChild(img);
        });
        container.style.border = '1px solid red';
        document.body.appendChild(container);

        document.body.appendChild(container);
    }
</script>