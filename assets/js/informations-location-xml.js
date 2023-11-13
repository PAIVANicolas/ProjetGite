document.addEventListener('DOMContentLoaded', function() {
    mettreInfosPresentationAJour();
});

function mettreInfosPresentationAJour(){


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

            tarifSemaineMoyenneInput.textContent  = infos.tarifs && infos.tarifs.semaineMoyenneSaison || 'Pas de tarif';
            tarifNuiteeMoyenneInput.textContent  = infos.tarifs && infos.tarifs.nuiteeMoyenneSaison || 'Pas de tarif';
            tarifSemaineHauteInput.textContent  = infos.tarifs && infos.tarifs.semaineHauteSaison || 'Pas de tarif';
            tarifNuiteeHauteInput.textContent  = infos.tarifs && infos.tarifs.nuiteeHauteSaison || 'Pas de tarif';
            dateDebutInput.textContent  = infos.datesOuverture && infos.datesOuverture.dateDebut || 'Pas de date de début';
            dateFinInput.textContent  = infos.datesOuverture && infos.datesOuverture.dateFin || 'Pas de date de fin';
        }
    };
    xhr.send();
}