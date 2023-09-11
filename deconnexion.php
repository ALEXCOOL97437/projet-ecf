<?php
session_start();
$_SESSION = array(); // Déclare la session dans un tableau pour supprimer
session_destroy();
header('Location: gamesoft-page-accueil.php');
?>