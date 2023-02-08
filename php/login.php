<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$_SESSION['login'] = $login;

$con = mysqli_connect('172.10.10.64', 'evan', 'feur', 'AirQuality');
if ($con->connect_error) {
    die("Erreur : 1conn->connect_error");
}

$creds = ($con->real_query("SELECT `MotDePasse` FROM `Credentials` WHERE `NomUtilisateur` = '$login'"));
$results = $con->use_result();

foreach($results as $row) {
    $sqlPassword = $row['MotDePasse'];
}

echo($sqlPassword);

if (empty($login) || empty($password)) {
    $isEmpty = True;
} else {
    $isEmpty = false;
}

if (isset($_POST['envoi'])) {
    if (mysqli_num_rows($results) != 0 && $password == $sqlPassword && $isEmpty == False) {
        header('Location: http://localhost/pbs/site.html');
    } else {
        if ($isEmpty) {
            header('Location: http://localhost/pbs/index.html');

            }  else {
                header('Location: http://localhost/pbs/index.html');

        }
    }
}
