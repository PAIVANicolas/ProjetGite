function validerReservation(id) {
    var startTime = prompt("Veuillez entrer l'heure de début (format HH:mm) :");
    var endTime = prompt("Veuillez entrer l'heure de fin (format HH:mm) :");
    if (startTime && endTime) {
        updateReservation(id, 'confirmée', startTime, endTime);
    }
}


function supprimerReservation(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cette réservation?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete-reservation.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                calendar.refetchEvents();
            }
        }
        xhr.send("id=" + id);
    }
}



function updateReservation(id, status, startTime, endTime) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update-reservation.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        console.log("test");
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            console.log("test ok");
            calendar.refetchEvents();
        }
    }
    xhr.send("id=" + id + "&status=" + status + "&start_time=" + startTime + "&end_time=" + endTime);
    console.log("id=" + id + "&status=" + status + "&start_time=" + startTime + "&end_time=" + endTime);
    console.log(startTime + endTime );
}
