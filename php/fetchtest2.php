<?php
// Afficher les erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Se connecter à la base de données
$con = mysqli_connect('172.10.10.82', 'evan1', 'feur', 'AirQuality');

// Vérifier si la connexion a réussi
if ($con->connect_error) {
    die("Erreur : 1conn->connect_error");
}

// Sélectionner les 20 dernières lignes de la table 'Valeurs'
$sql = 'SELECT * FROM Valeurs ORDER BY ID DESC LIMIT 20';

// Exécuter la requête
$result = mysqli_real_query($con, $sql);

// Obtenir le résultat de la requête
$usedresult = mysqli_use_result($con);

// Initialiser des tableaux pour stocker les données récupérées
$temp = [];
$humi = [];
$co2 = [];
$horaire = [];

// Parcourir le résultat de la requête et stocker les données dans les tableaux
while ($row = $usedresult->fetch_assoc()) {
    array_push($temp, $row['temperature']);
    array_push($humi, $row['humidite']);
    array_push($co2, $row['CO2']);
    array_push($horaire, $row['horaire']);
}

// Créer un tableau associatif pour stocker toutes les données récupérées
$mainArray = [
    'temp' => $temp,
    'humi' => $humi,
    'co2' => $co2,
    'horaire' => $horaire
];

// Encoder le tableau en tant qu'objet JSON et le renvoyer en sortie
echo json_encode($mainArray);
?>