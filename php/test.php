<?php 
$login = $_POST['login'];
$password = $_POST['password'];

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
        header('Location: http://127.0.0.1:5555/site.html');
    } else {
        if ($isEmpty) {
            header('Location: http://127.0.0.1:5555/index.html');

            }  else {
                header('Location: http://127.0.0.1:5555/index.html');

        }
    }
}
