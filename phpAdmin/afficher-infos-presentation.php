<form method="post" id="updateForm">
    <label class="title-form">Texte de Présentation:</label>
    <textarea name="presentation" id="presentation" class="input-texte" rows="5" placeholder="Entrez le nouveau texte de présentation ici"></textarea><br>

    <section class="row">
        <fieldset>
            <legend><strong>Tarifs:</strong></legend>

            <label class="title-form">Semaine Moyenne Saison:</label>
            <input type="text" name="tarif_semaine_moyenne" id="tarif_semaine_moyenne" class="input-texte" placeholder="€"><br>

            <label class="title-form">Nuitée Moyenne Saison:</label>
            <input type="text" name="tarif_nuitee_moyenne" id="tarif_nuitee_moyenne" class="input-texte" placeholder="€"><br>

            <label class="title-form">Semaine Haute Saison:</label>
            <input type="text" name="tarif_semaine_haute" id="tarif_semaine_haute" class="input-texte" placeholder="€"><br>

            <label class="title-form">Nuitée Haute Saison:</label>
            <input type="text" name="tarif_nuitee_haute" id="tarif_nuitee_haute" class="input-texte" placeholder="€"><br>
        </fieldset>

        <fieldset>
            <legend><strong>Dates d'Ouverture:</strong></legend>

            <label class="title-form">Date de Début:</label>
            <input type="date" name="date_debut" id="date_debut"><br>

            <label class="title-form">Date de Fin:</label>
            <input type="date" name="date_fin" id="date_fin"><br>
        </fieldset>
    </section>
    <input type="submit" value="Mettre à jour">
</form>