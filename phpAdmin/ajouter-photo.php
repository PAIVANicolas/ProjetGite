<link rel="stylesheet" type="text/css" href="../assets/css/ajoutphoto.css">
<div class="bloc-ajout-photo">
    <form id="imageForm">
        <div class="form-img">
            <div class="form-group">
                <label for="section">Section :</label>
                <select id="section" name="section">

                    <?php
                    require('../assets/bdd/config.php');

                    $sql = "SHOW COLUMNS FROM Image WHERE Field='section'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $enumList = explode(",", str_replace("'", "", substr($row['Type'], 5, (strlen($row['Type'])-6))));
                        foreach($enumList as $value)
                            echo "<option value=\"$value\">$value</option>";
                    }

                    $conn->close();
                    ?>
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
    </form>
    <img id="imagePreview"></div>
</div>

<script>
    document.getElementById('imageForm').addEventListener('submit', function(e) {
        e.preventDefault();  // Empêche le comportement d'envoi normal du formulaire

        var formData = new FormData(this);  // Crée un objet FormData avec les données du formulaire

        fetch('upload.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);  // Affiche la réponse du serveur
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    console.log("non");
    document.getElementById('cancelButton').addEventListener('click', function() {
        console.log("trouvé");
        document.getElementById('imageForm').reset();
        document.getElementById('imagePreview').style.display = 'none';  // Cache l'aperçu de l'image
    });


    function previewImage(event) {
        var imagePreview = document.getElementById('imagePreview');
        imagePreview.src = URL.createObjectURL(event.target.files[0]);
        imagePreview.onload = function() {
            URL.revokeObjectURL(imagePreview.src) // Free up memory
        }
        imagePreview.style.display = 'block'; // Show image preview
    }
</script>

