<?php

// CHEMIN DU FICHIER: /srv/http/AirQuality/php/fetchLive.php

// Afficher les erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données MySQL
$con = mysqli_connect('172.10.10.82', 'evan1', 'feur', 'AirQuality');
if ($con->connect_error) {
    die("Erreur : 1conn->connect_error");
}

// Requête SQL pour récupérer les 20 dernières valeurs de la table "Valeurs"
$sql = 'SELECT * FROM Valeurs ORDER BY ID DESC LIMIT 20';
$result = mysqli_real_query($con, $sql);

// Récupération des résultats de la requête
$usedresult = mysqli_use_result($con);

// Encodage des résultats en format JSON et affichage
echo json_encode($usedresult->fetch_assoc());
?>
