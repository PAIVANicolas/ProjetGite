<link rel="stylesheet" type="text/css" href="../assets/css/ajoutphoto.css">
<div class="bloc-ajout-photo">
    <form id="imageForm">
        <div class="form-img">
            <div class="form-group">
                <div class="label-container">
                    <label for="section">Section :</label>
                </div>
                <select id="section" name="section" class="select-section">
                    <?php include_once('../phpAdmin/afficher-sections-image.php');?>
                </select>
            </div>
            <div class="form-group">
                <div class="label-container">
                    <label for="image">Image :</label>
                </div>
                <input type="file" id="image" name="image" accept="image/*" class="input-image">
            </div>
            <div class="form-group">
                <p id="resizeLink" style="display:none;">
                    Votre image est trop grande, merci de la redimensionner en 400 px par 400px
                    <a href="https://www.iloveimg.com/fr/redimensionner-image" target="_blank">lien pour redimensionner l'image</a>.
                </p>
                <div class="label-container">
                    <label for="imageAlt">Description de l'image :</label>
                </div>
                <input type="text" id="imageAlt" name="image_alt" required class="input-description">
            </div>
            <button type="submit" class="submit-button">Ajouter l'image</button>

        </div>
    </form>
</div>

<script src="../assets/js/ajouterImage.js"></script>

<script src="../assets/js/controleTailleImage.js"></script>

