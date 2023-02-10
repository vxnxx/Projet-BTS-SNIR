<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$select = $_POST['classeSelect'];
$login = $_SESSION['utilisateur'];

echo("Vous etes $login et vous avez choisis la classe n°$select");
?>