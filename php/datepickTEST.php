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
        $requetes[] = new Requete( $row['id'], $salle, $row['date'], $row['horaire'], $row['humidité'] ,$row['température']);
        echo("Salle : " . $salle . "<br>");
        echo("ID : " . $row['id'] . "<br>");
        echo("Temp : " . $row['température'] . "<br>");
        echo("Humidité : " . $row['humidité'] . "<br>");
        echo("Date : " . $row['date'] . "<br>");
        echo("Horaire : " . $row['horaire'] . "<br>");
        echo("<br>");
    }
} else {
    echo "0 résultats";
}

foreach($requetes as $requete) {
    print_r($requete);
    echo("<br>");
}

echo("test : " . $requetes[1]->horaire);



$con->close();




?>