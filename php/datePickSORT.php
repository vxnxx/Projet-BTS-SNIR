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
    }
} else {
    echo "0 résultats";
}

$listHoraires = [];

foreach ($requetes as $requete) {
    $listHoraires[] = strtotime($requete->horaire);
}

sort($listHoraires);
$finalHoraires = [];

foreach($listHoraires as $Horaires) {
    $finalHoraires[] = date("H:i:s",$Horaires);
}

$_SESSION['listHoraires'] = $finalHoraires;

$matchingID = [];

foreach ($requetes as $requete) {
    if (in_array($requete->horaire, $finalHoraires)) {
        $matchingID[] = $requete->id;
    }
}

print_r($finalHoraires);
echo("<br>");
print_r($matchingID);
//header('Location: http://172.10.10.56/pbs/historique.php');


$con->close();




?>