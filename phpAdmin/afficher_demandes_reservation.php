<?php
require('../assets/bdd/config.php');

$requetetableau = "SELECT * FROM reservations where status !='confirmée'";
$resulttableau = $conn->query($requetetableau);
if ($resulttableau->num_rows > 0) {
    while($row = $resulttableau->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["start_date"] . "</td>";
        echo "<td>" . $row["end_date"] . "</td>";
        echo "<td>" . $row["client_name"] . "</td>";
        echo "<td>" . $row["client_surname"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>";
        echo "<button onclick='validerReservation(" . $row["id"] . ")'>Valider</button>";
        echo "<button onclick='deleteEvent(" . $row["id"] . ")'>Supprimer</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Aucune réservation trouvée</td></tr>";
}
?>