<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (empty($_SESSION['utilisateur'])) {
?>
  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Veuillez vous connecter !</title>
  </head>

  <body>
    <div class="topLoginContainer">
      <span class="welcome">Veuillez vous connecter avant d'acceder a AirQuality</span>
      <span class="slogan"> Vous ne pouvez pas acceder a ce contenu si vous n'etes pas connecté a un compte</span>
      <a href="http://172.10.10.56/pbs/index.html">
        <button class="bouton" type="button">Retourner a l'accueil</button>
      </a>
    </div>
  </body>

  </html>
<?php
} else { ?>
  <?php

$select = $_POST['classeSelect'];
$login = $_SESSION['utilisateur'];

echo ("<span class=\"center loginLabel phpLabel\">Vous etes $login et vous avez choisis la classe n°$select</span>");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <title>Veuillez vous connecter !</title>
</head>
<link rel="stylesheet" href="styles.css">

<body>
  <div class="canvasDiv loginLabel">
    <canvas id="tempChart" style="width:100%;max-width:600px"></canvas>
    <label class="phpLabel">Courbe de température</label>
  </div>
  <div class="canvasDiv loginLabel">
    <canvas id="co2Chart" style="width:100%;max-width:600px"></canvas>
    <label class="phpLabel">Taux de co2</label>
  </div>


  
  <script src="js/refreshCharts.js"></script>
</body>
</html>

<?php } ?>