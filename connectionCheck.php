<?php
session_start();

// Vérifier si la variable de session 'username' existe et contient une valeur
if (!empty($_SESSION['username'])) {
    // L'utilisateur est connecté, vous pouvez autoriser l'accès à cette page
} else {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: login.php"); // Assurez-vous de spécifier le bon chemin
    exit;
}
?>