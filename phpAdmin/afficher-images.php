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

<script src="../assets/js/afficherImages.js"></script>