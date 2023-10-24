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
            calendar.refetchEvents();
        }
    }
    console.log(eventId);
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
                calendar.refetchEvents();
                alert("Succès");
            } else {
                alert("Une erreur est survenue. Veuillez réessayer.");
            }
        }
    }
    xhr.send("id=" + id + "&status=" + status + "&start_time=" + startTime + "&end_time=" + endTime);
}