<?php

// Activation de l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclusion de la classe requeteClass.php et démarrage de la session
include_once "requeteClass.php";
session_start();

// Récupération des données envoyées en POST
$date = $_POST['date'];
$salle = $_POST['classeSelect']; 

// Connexion à la base de données
$con = mysqli_connect('172.10.10.82', 'evan1', 'feur', 'AirQuality');

// Vérification de la connexion
if ($con->connect_error) {
    die("Erreur : 1conn->connect_error");
}

// Échappement des caractères spéciaux dans les variables $date et $salle
$sanitizedDate = mysqli_real_escape_string($con, $date); 
$sanitizedSalle = mysqli_real_escape_string($con, $salle); 

// Préparation de la requête SQL avec des paramètres
$sql = "SELECT * FROM Valeurs WHERE date = ? AND salle = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $sanitizedDate, $sanitizedSalle);
$stmt->execute();
$result = $stmt->get_result();

// Création d'un tableau pour stocker les requêtes
$requetes = [];

// Si la requête retourne des résultats, on les stocke dans le tableau $requetes
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $requetes[] = new Requete( $row['id'], $salle, $row['date'], $row['horaire'], $row['CO2'] ,$row['temperature']);
    }
} else {
    echo "0 résultats";
}

// Création de tableaux pour stocker les horaires, dates, CO2 et températures
$listHoraires = [];
$listDates = [];
$listC02 = [];
$listTemperature = [];

// Remplissage des tableaux avec les données des requêtes
foreach ($requetes as $requete) {
    $listHoraires[] = $requete->horaire;
    $listDates[] = $requete->date;
    $listC02[] = $requete->co2;
    $listTemperature[] = $requete->temperature;
}

// Stockage des tableaux dans la session
$_SESSION['listHoraires'] = $listHoraires;
$_SESSION['listDates'] = $listDates;
$_SESSION['listC02'] = $listC02;
$_SESSION['listTemperature'] = $listTemperature;
$_SESSION['salle'] = $salle;

// Redirection vers la page historique.php
header('Location: http://172.10.10.56/AirQuality/historique.php');

// Fermeture de la connexion à la base de données
$con->close();
?>