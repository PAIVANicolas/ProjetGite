<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/bdd/config.php");
include($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/phpAdmin/cheminsImages.php");
?>
<div>
    <form id="imageVisionForm">
        <div class="form-img-vision">
            <div class="form-group-vision">
                <label for="section">Section :</label>
                <select id="section" name="section">
                    <?php include('/ProjetGite/phpAdmin/afficher-sections-image.php'); ?>
                </select>
            </div>
            <button type="submit">Voir les images</button>
        </div>
    </form>

    <div class="images-container">

    </div>
</div>
<script src="/ProjetGite/assets/js/afficherImages.js"></script>
