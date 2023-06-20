<?php 

// Configuration pour afficher les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Démarrage de la session
session_start();

// Récupération des données du formulaire
$login = $_POST['login'];
$password = $_POST['password'];

// Stockage du nom d'utilisateur dans la session
$_SESSION['utilisateur'] = $login;

// Connexion à la base de données
$con = mysqli_connect('172.10.10.82', 'evan1', 'feur', 'AirQuality');
if ($con->connect_error) {
    die("Erreur : 1conn->connect_error");
}

// Échappement des caractères spéciaux dans le nom d'utilisateur
$sanitizedLogin = mysqli_real_escape_string($con, $login);

// Préparation de la requête SQL pour récupérer le mot de passe et le grade de l'utilisateur
$stmt = $con->prepare("SELECT `MotDePasse`,`Grade` FROM `Credentials` WHERE `NomUtilisateur` = ?");
$stmt->bind_param("s", $sanitizedLogin);
$stmt->execute();
$results = $stmt->get_result();

// Récupération du mot de passe et du grade de l'utilisateur
foreach($results as $row) {
    $sqlPassword = $row['MotDePasse'];
    $sqlGrade = $row['Grade'];
}

// Vérification si le formulaire est vide
if (empty($login) || empty($password)) {
    $isEmpty = True;
} else {
    $isEmpty = false;
}

// Vérification si le formulaire a été soumis
if (isset($_POST['envoi'])) {
    // Vérification si l'utilisateur existe et si le mot de passe est correct
    if (mysqli_num_rows($results) != 0 && $password == $sqlPassword && $isEmpty == False) {
        // Redirection vers la page d'accueil
        header('Location: http://172.10.10.56/AirQuality/site.php');
        $_SESSION['grade'] = $sqlGrade;
    } else {
        // Redirection vers la page de connexion avec un message d'erreur approprié
        if ($isEmpty) {
            header('Location: http://172.10.10.56/AirQuality/index.php?empty=True');

            }  else {
                header('Location: http://172.10.10.56/AirQuality/index.php?invalidPassword=True');

        }
    }
}
