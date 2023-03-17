<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "requeteClass.php";
session_start();

$date = $_POST['date'];
$salle = $_POST['classeSelect']; 

$sql = "SELECT * FROM Valeurs WHERE date = '$date' AND salle = '$salle'";

$con = mysqli_connect('172.10.10.82', 'evan1', 'feur', 'AirQuality');
if ($con->connect_error) {
    die("Erreur : 1conn->connect_error");
}

$result = $con->query($sql);

$requetes = [];


if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $requetes[] = new Requete( $row['id'], $salle, $row['date'], $row['horaire'], $row['CO2'] ,$row['température']);
    }
} else {
    echo "0 résultats";
}

$listHoraires = [];

foreach ($requetes as $requete) {
    $listHoraires[] = $requete->horaire;
    $listDates[] = $requete->date;
    $listC02[] = $requete->co2;
    $listTemperature[] = $requete->temperature;
}

$_SESSION['listHoraires'] = $listHoraires;
$_SESSION['listDates'] = $listDates;
$_SESSION['listC02'] = $listC02;
$_SESSION['listTemperature'] = $listTemperature;

header('Location: http://172.10.10.56/pbs/historique.php');


$con->close();




?>