<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$date = $_POST['date'];


$con = mysqli_connect('172.10.10.82', 'evan1', 'feur', 'AirQuality');
if ($con->connect_error) {
    die("Erreur : 1conn->connect_error");
}


$creds = ($con->real_query("SELECT `humidité`,`température` FROM `Valeurs` WHERE `date` = '$date'"));
$results = $con->use_result();

foreach($results as $row) {
    $temperature = $row['température'];
    $humidite = $row['humidité'];
}

echo("temp : $temperature  humide : $humidite \n");
var_dump($temperature);
var_dump($humidite);
?>