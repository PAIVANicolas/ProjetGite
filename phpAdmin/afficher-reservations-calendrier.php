<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/bdd/config.php");

$requetecalendrier = "SELECT * FROM reservations where status !='rejetée'";
$requetetableau = "SELECT * FROM reservations where status !='confirmée'";
$resultcalendrier = $conn->query($requetecalendrier);
$resulttableau = $conn->query($requetetableau);
$events = array();


if ($resultcalendrier->num_rows > 0) {
    while ($row = $resultcalendrier->fetch_assoc()) {
        $end_date = new DateTime($row["end_date"]);

        $events[] = array(
            'id' => $row["id"],
            'title' => $row["client_name"] . ' ' . $row["client_surname"],
            'start' => $row["start_date"],
            'end' => $end_date->format('Y-m-d H:i:s'),
            'color' => ($row["status"] == 'rejetée') ? 'red' : (($row["status"] == 'confirmée') ? 'green' : 'orange')
        );
    }
    $resultcalendrier->data_seek(0);
    echo json_encode($events);
} else {
    $events[] = array();
    echo json_encode($events);
}

?>