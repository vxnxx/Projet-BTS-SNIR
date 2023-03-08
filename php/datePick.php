<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$date = $_POST['date'];

$sql = "SELECT * FROM Valeurs WHERE date = '$date'";

$con = mysqli_connect('172.10.10.82', 'evan1', 'feur', 'AirQuality');
if ($con->connect_error) {
    die("Erreur : 1conn->connect_error");
}

$result = $con->query($sql);


if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
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


$con->close();




?>