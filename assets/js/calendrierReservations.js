function validerReservation(id) {
    var startTime = prompt("Veuillez entrer l'heure de début (format HH:mm) :");
    if (startTime){
        var endTime = prompt("Veuillez entrer l'heure de fin (format HH:mm) :");
        if (startTime && endTime) {
            updateReservation(id, 'confirmée', startTime, endTime);
        }
    }

}


function deleteEvent(eventId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "delete-reservation.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            refreshTable();
            calendar.refetchEvents();
        }
    }

    xhr.send("id=" + eventId);
}


function updateReservation(id, status, startTime, endTime) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update-reservation.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        console.log(this.responseText);
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            if (this.responseText === "overlap") {
                alert("Il y a un chevauchement avec un autre rendez-vous, merci de le supprimer ou d'adapter l'heure du rendez-vous");
            } else if (this.responseText === "success") {
                refreshTable();
                calendar.refetchEvents();
                alert("Succès");
            } else {
                alert("Une erreur est survenue. Veuillez réessayer.");
            }
        }
    }
    xhr.send("id=" + id + "&status=" + status + "&start_time=" + startTime + "&end_time=" + endTime);
}

async function refreshTable() {
    try {
        let responseTable = await fetch('../phpAdmin/afficher_demandes_reservation.php');
        let responseCalendar = await fetch('../phpAdmin/afficher-reservations-calendrier.php');
        if (!responseTable.ok) {
            throw new Error('Network response was not ok ' + responseTable.statusText);
        }
        let data = await responseTable.text();
        let eventsData = await responseCalendar.json();

        document.querySelector('.tableau-reservations tbody').innerHTML = data;
        calendar.removeAllEvents();
        eventsData.forEach(event => {
            calendar.addEvent(event);
        });
    } catch (error) {
        console.error('Erreur lors de la récupération des réservations pour');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    refreshTable();
});


setInterval(refreshTable, 5000);