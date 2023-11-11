<button id="reset-button" style="display: none" class="reset-button" id="reset-button" onclick="resetCards()">Fermer</button>

<div class="card-container">
    <div class="card">
        <div class="card-title">Modification de page</div>
        <div class="card-content-inserer-image" hidden="hidden">
            <?php include($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/phpAdmin/afficher-infos-presentation.php");?>
        </div>
        <button class="card-button" onclick="expandCard(1);mettreInfosAJour()">Ouvrir</button>

    </div>
    <div class="card">
        <div class="card-title">Insérer des images</div>
        <div class="card-content-inserer-image" hidden="hidden">
            <?php include($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/phpAdmin/ajouter-photo.php");?>
        </div>
        <button class="card-button" onclick="expandCard(2)">Ouvrir</button>
    </div>
    <div class="card">
        <div class="card-title">Gérer les images</div>
        <div class="card-content-modifier-image" hidden="hidden">
            <?php include($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/phpAdmin/afficher-images.php");?>
        </div>
        <button class="card-button" onclick="expandCard(3)">Ouvrir</button>
    </div>
    <div class="card">
        <div class="card-title">Gérer les informations contact</div>
        <div class="card-content-contact-image" hidden="hidden">
            <?php include ($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/phpAdmin/afficher-contact.php");?>
        </div>
        <button class="card-button" onclick="expandCard(4); mettreContactAJour();" >Ouvrir</button>
    </div>
</div>

<script src="/ProjetGite/assets/js/informationsContact.js"></script>
<script src="/ProjetGite/assets/js/informationsPresentation.js"></script>