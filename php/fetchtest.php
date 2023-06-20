<?php
// Connexion à la base de données
$con = mysqli_connect('172.10.10.82', 'evan1', 'feur', 'AirQuality');

// Vérification de la connexion
if ($con->connect_error) {
    die("Erreur : 1conn->connect_error");
}

// Requête SQL pour récupérer la dernière ligne de la table Valeurs
$sql = 'SELECT * FROM Valeurs ORDER BY ID DESC LIMIT 1';

// Exécution de la requête SQL
$result = mysqli_real_query($con, $sql);

// Récupération des résultats de la requête
$usedresult = mysqli_use_result($con);

// Encodage des résultats en format JSON et affichage
echo json_encode($usedresult->fetch_assoc());
?>