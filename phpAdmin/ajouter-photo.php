<link rel="stylesheet" type="text/css" href="../assets/css/ajoutphoto.css">
<div class="bloc-ajout-photo">
    <form id="imageForm">
        <div class="form-img">
            <div class="form-group">
                <label for="section">Section :</label>
                <select id="section" name="section">
                    <?php include_once ('../phpAdmin/afficher-sections-image.php');?>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image :</label>
                <input type="file" id="image" name="image" accept="image/*" required onchange="previewImage(event)">
            </div>

            <div class="form-group">
                <label for="imageAlt">Description de l'image :</label>
                <input type="text" id="imageAlt" name="image_alt" required>
            </div>
            <button type="submit">Ajouter l'image</button>
        </div>
    </form>
</div>

<script src="../assets/js/ajouterImage.js"></script>