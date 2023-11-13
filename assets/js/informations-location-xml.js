document.addEventListener('DOMContentLoaded', function() {
    mettreInfosPresentationAJour();
});

function mettreInfosPresentationAJour(){

    var apartirde = document.getElementById('apartirde');
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
            apartirde.textContent = infos.presentation || 'Prix moyen à la semaine non défini';
            tarifSemaineMoyenneInput.textContent  = infos.tarifs && infos.tarifs.semaineMoyenneSaison || 'Pas de tarif';
            tarifNuiteeMoyenneInput.textContent  = infos.tarifs && infos.tarifs.nuiteeMoyenneSaison || 'Pas de tarif';
            tarifSemaineHauteInput.textContent  = infos.tarifs && infos.tarifs.semaineHauteSaison || 'Pas de tarif';
            tarifNuiteeHauteInput.textContent  = infos.tarifs && infos.tarifs.nuiteeHauteSaison || 'Pas de tarif';
            if (infos.datesOuverture && infos.datesOuverture.dateDebut && infos.datesOuverture.dateFin) {
                var dateDebutFormatee = convertirDateFormat(infos.datesOuverture.dateDebut);
                var dateFinFormatee = convertirDateFormat(infos.datesOuverture.dateFin);
                dateDebutInput.textContent = dateDebutFormatee;
                dateFinInput.textContent = dateFinFormatee;
            } else {
                dateDebutInput.textContent = 'Pas de date de début';
                dateFinInput.textContent = 'Pas de date de fin';
            }
        }
    };
    xhr.send();
}

function convertirDateFormat(dateString) {
    var dateParts = dateString.split('-'); // divise la date en [yyyy, mm, dd]
    return dateParts[2] + '/' + dateParts[1] + '/' + dateParts[0]; // recombine dans le format dd/mm/yyyy
}
