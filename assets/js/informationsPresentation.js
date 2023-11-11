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

    xhr.onreadystatechange = function() {
        console.log(xhr.responseText);
        if (xhr.readyState == 4 && xhr.status == 200) {
            var infos = JSON.parse(xhr.responseText);
            presentationInput.value = infos.presentation || 'Pas de texte de présentation';
            tarifSemaineMoyenneInput.value = infos.tarifSemaineMoyenne || 'Pas de tarif';
            tarifNuiteeMoyenneInput.value = infos.tarifNuiteeMoyenne || 'Pas de tarif';
            tarifSemaineHauteInput.value = infos.tarifSemaineHaute || 'Pas de tarif';
            tarifNuiteeHauteInput.value = infos.tarifNuiteeHaute || 'Pas de tarif';
            dateDebutInput.value = infos.dateDebut || 'Pas de date de début';
            dateFinInput.value = infos.dateFin || 'Pas de date de fin';
            console.log(infos);
        }
    };

    xhr.send('presentation=' + encodeURIComponent(presentationInput.value) +
        '&tarifSemaineMoyenne=' + encodeURIComponent(tarifSemaineMoyenneInput.value) +
        '&tarifNuiteeMoyenne=' + encodeURIComponent(tarifNuiteeMoyenneInput.value) +
        '&tarifSemaineHaute=' + encodeURIComponent(tarifSemaineHauteInput.value) +
        '&tarifNuiteeHaute=' + encodeURIComponent(tarifNuiteeHauteInput.value) +
        '&dateDebut=' + encodeURIComponent(dateDebutInput.value) +
        '&dateFin=' + encodeURIComponent(dateFinInput.value));
}
