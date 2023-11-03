<?php
require($_SERVER['DOCUMENT_ROOT'] . "/ProjetGite/assets/bdd/config.php");

$sql = "SHOW COLUMNS FROM Image WHERE Field='section'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $enumList = explode(",", str_replace("'", "", substr($row['Type'], 5, (strlen($row['Type'])-6))));
    foreach($enumList as $value)
        echo "<option value=\"$value\">$value</option>";
}
$conn->close();
?>