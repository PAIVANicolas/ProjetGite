<button id="reset-button" style="display: none" class="reset-button" id="reset-button" onclick="resetCards()">Annuler</button>

<div class="card-container">
    <div class="card">
        <div class="card-title">Modification de page</div>
        <button class="card-button" onclick="expandCard(1)">Ouvrir</button>
    </div>
    <div class="card">
        <div class="card-title">Inserter des images</div>
        <div class="card-content-inserer-image" hidden="hidden">
            <?php include ("../phpAdmin/ajouter-photo.php");?>
        </div>
        <button class="card-button" onclick="expandCard(2)">Ouvrir</button>
    </div>
    <div class="card">
        <div class="card-title">Gérer les images</div>
        <div class="card-content-modifier-image" hidden="hidden">
            <?php include ("../phpAdmin/afficher-images.php");?>
        </div>
        <button class="card-button" onclick="expandCard(3)">Ouvrir</button>
    </div>
    <div class="card">
        <div class="card-title">Gérer les images</div>
        <div class="card-content-contact-image" hidden="hidden">
            <?php include ("../phpAdmin/afficher-contact.php");?>
        </div>
        <button class="card-button" onclick="expandCard(4)">Ouvrir</button>
    </div>
</div>