<?php
//Recupere la session afin d'acceder à $_SESSION
session_start();
// Détruit toutes les variables de session
$_SESSION = array();
//Permet de vider les variables de session
session_unset();
//Detruit la session
session_destroy();
//vide le cache
header("Cache-Control:no-cache");
//Redirection
header('location:index.php');
