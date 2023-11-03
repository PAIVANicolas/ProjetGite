<?php
require('/ProjetGite/assets/bdd/config.php');

$requetecalendrier = "SELECT * FROM reservations where status !='rejetée' and status !='en attente'";

$resultcalendrier = $conn->query($requetecalendrier);

$events = array();


if ($resultcalendrier->num_rows > 0) {
    while($row = $resultcalendrier->fetch_assoc()) {
        $end_date = new DateTime($row["end_date"]);

        $events[] = array(
            'start' => $row["start_date"],
            'end' => $end_date->format('Y-m-d H:i:s'),
            'color' => ($row["status"] == 'rejetée') ? 'red' : (($row["status"] == 'confirmée') ? 'red' : 'orange')
        );
    }
    $resultcalendrier->data_seek(0);
    echo json_encode($events);
}else {
    $events[] = array();
    echo json_encode($events);
}
?>