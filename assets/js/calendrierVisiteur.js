
async function refreshTable() {
    try {

        let responseCalendar = await fetch('php/afficher-reservations-visiteur.php');
        console.log(responseCalendar);
        if(responseCalendar){

            let eventsData = await responseCalendar.json();

            calendar.removeAllEvents();
            eventsData.forEach(data => {
                calendar.addEvent(data);
            });
        }
    } catch (error) {
        console.error('Erreur lors de la récupération des réservations pour'+error);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    refreshTable();
});


setInterval(refreshTable, 15000);