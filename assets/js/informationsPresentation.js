document.getElementById('updateForm').addEventListener('submit', function(e) {
    e.preventDefault();
    mettreInfosAJour();
});

function mettreInfosAJour() {
    var presentationInput = document.getElementById('presentation');
    var tarifSemaineMoyenneInput = document.getElementById('tarif_semaine_moyenne');
    var tarifNuiteeMoyenneInput = document.getElementById('tarif_nuitee_moyenne');
    var tarifSemaineHauteInput = document.getElementById('tarif_semaine_haute');
    var tarifNuiteeHauteInput = document.getElementById('tarif_nuitee_haute');
    var dateDebutInput = document.getElementById('date_debut');
    var dateFinInput = document.getElementById('date_fin');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/ProjetGite/phpAdmin/action/afficher-infos-presentation-action.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');



    xhr.send('presentation=' + encodeURIComponent(presentationInput.value) +
        '&tarif_semaine_moyenne=' + encodeURIComponent(tarifSemaineMoyenneInput.value) +
        '&tarif_nuitee_moyenne=' + encodeURIComponent(tarifNuiteeMoyenneInput.value) +
        '&tarif_semaine_haute=' + encodeURIComponent(tarifSemaineHauteInput.value) +
        '&tarif_nuitee_haute=' + encodeURIComponent(tarifNuiteeHauteInput.value) +
        '&date_debut=' + encodeURIComponent(dateDebutInput.value) +
        '&date_fin=' + encodeURIComponent(dateFinInput.value));
}

function mettreInfosPresentationAJour(){

    var presentationInput = document.getElementById('presentation');
    var tarifSemaineMoyenneInput = document.getElementById('tarif_semaine_moyenne');
    var tarifNuiteeMoyenneInput = document.getElementById('tarif_nuitee_moyenne');
    var tarifSemaineHauteInput = document.getElementById('tarif_semaine_haute');
    var tarifNuiteeHauteInput = document.getElementById('tarif_nuitee_haute');
    var dateDebutInput = document.getElementById('date_debut');
    var dateFinInput = document.getElementById('date_fin');

    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/ProjetGite/phpAdmin/action/afficher-infos-presentation-action.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {

        if (xhr.readyState == 4 && xhr.status == 200) {

            var infos = JSON.parse(xhr.responseText);
            presentationInput.value = infos.presentation || 'Pas de texte de présentation';
            tarifSemaineMoyenneInput.value = infos.tarifs && infos.tarifs.semaineMoyenneSaison || 'Pas de tarif';
            tarifNuiteeMoyenneInput.value = infos.tarifs && infos.tarifs.nuiteeMoyenneSaison || 'Pas de tarif';
            tarifSemaineHauteInput.value = infos.tarifs && infos.tarifs.semaineHauteSaison || 'Pas de tarif';
            tarifNuiteeHauteInput.value = infos.tarifs && infos.tarifs.nuiteeHauteSaison || 'Pas de tarif';
            dateDebutInput.value = infos.datesOuverture && infos.datesOuverture.dateDebut || 'Pas de date de début';
            dateFinInput.value = infos.datesOuverture && infos.datesOuverture.dateFin || 'Pas de date de fin';
        }
    };
    xhr.send();
}