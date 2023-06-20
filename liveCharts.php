<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" href="img/favicon.ico" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gauge.js/1.3.7/gauge.min.js" integrity="sha512-J0d1VfdfTSDoDPEsahCtf2nC+groXdWkuQFyJjS+s3CpKj63X9Hf3pMEJtjIJt/ODh0QwTRx2/OioL+9fMoqSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>AirQuality</title>
</head>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (empty($_SESSION['utilisateur'])) {
?>

  <body>
    <div class="topLoginContainer">
      <span class="welcome">Veuillez vous connecter avant d'acceder a AirQuality</span>
      <span class="slogan"> Vous ne pouvez pas acceder a ce contenu si vous n'etes pas connecté a un compte</span>
      <a href="http://172.10.10.56/AirQuality/index.php">
        <button class="bouton" type="button">Retourner a l'accueil</button>
      </a>
    </div>
  </body>

</html>
<?php
} else { if (empty($_POST['classeSelect'])) {
    ?>
    
      <body>
        <div class="topLoginContainer">
          <span class="welcome">Vous avez oublié de choisir une salle !</span>
          <span class="slogan">Veuillez d'abord veiller a selectionner une salle ! </span>
          <a href="http://172.10.10.56/AirQuality/site.php">
            <button class="bouton" type="button">Choisir ma salle</button>
          </a>
        </div>
      </body>
    
    </html>
<?php
  }  else if ($_POST['classeSelect'] != "C204" && !empty($_POST['classeSelect'])) {
    ?>
    
      <body>
        <div class="topLoginContainer">
          <span class="welcome">AirQuality n'est pas encore déployé dans la salle <?php $_POST['classeSelect'] ?></span>
          <span class="slogan">Veuillez selectionner une autre salle !</span>
          <a href="http://172.10.10.56/AirQuality/site.php">
            <button class="bouton" type="button">Choisir une autre salle</button>
          </a>
        </div>
      </body>
    
    </html>
<?php
 }
   else {
      ?>

  <body>
    <?php
    echo ('
  <div class="svgDiv" onclick="window.location.href = \'http://172.10.10.56/AirQuality/site.php\';">
  <svg
    class="logoSvg"
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 826.21 275.25"
  >
    <defs></defs>
    <g id="Calque_2" data-name="Calque 2">
      <g id="Calque_2-2" data-name="Calque 2">
        <path
          class="cls-1"
          d="M206,5V123.5c0,15.5-30,35.5-89,54.5s-93,30-94,75c-7.45-6.62-12.54-12.25-16-17.61a43.28,43.28,0,0,1-3.27-6C2.47,223.07,1.18,211.49.5,190.67.19,181.17,0,169.74,0,156q0-7.89.36-15a201.41,201.41,0,0,1,3.49-29.52c.57-2.82,1.19-5.52,1.88-8.11C17.22,89.6,44.52,72,79,60c16.59-5.77,36.18-11.93,55-18.39l.5-.17C167.67,30,198.37,17.73,206,5Z"
        />
        <path
          class="cls-2"
          d="M134.5,0V107.5C134.5,129,113,147,91,157S7.42,175,7,235.39a43.28,43.28,0,0,1-3.27-6C2.47,223.07,1.18,211.49.5,190.67.19,181.17,0,169.74,0,156q0-7.89.36-15a201.41,201.41,0,0,1,3.49-29.52c.57-2.82,1.19-5.52,1.88-8.11C17.34,59.07,45.09,47.69,74,34,112,16,134.5,0,134.5,0Z"
        />
        <text class="cls-3" transform="translate(189.06 233.49)">
          AirQuality
        </text>
      </g>
    </g>
  </svg>
</div>
');

    $select = $_POST['classeSelect'];
    $utilisateur = $_SESSION['utilisateur'];

    echo ("<span class=\"center loginLabel phpLabel mt-2\" id=\"topLive\">Vous etes $utilisateur et vous avez choisis la classe n°$select</span>");
    ?>

    <div class="darkmode-btn">
      <img id="img" class="img-in-box" src="img/dark.png" onclick="tgm()">
    </div>

    <form class="logout" action="http://172.10.10.56/AirQuality/php/logout.php" method="post">
      <input class="" type="submit" value="Se déconnecter" name="deconnexion" />
    </form>

    <script src="js/keepDarkMode.js"></script>

    <div class="canvasDiv loginLabel">
      <canvas id="tempChart" style="width:100%;max-width:600px"></canvas>
      <label class="phpLabel">Courbe de température</label>
    </div>

    <div id="humiditeCanva"class="canvasDiv loginLabel">
      <canvas id="humidite"></canvas>
      <label class="phpLabel">Taux d'humidité</label>
      <label id="tauxHumidite" class="phpLabel"></label>
    </div>

    <div class="canvasDiv loginLabel">
      <canvas id="co2Chart" style="width:100%;max-width:600px"></canvas>
      <label class="phpLabel">Taux de co2</label>
    </div>

    <div class="divCenter">
      <button onclick="window.location.href = 'site.php';" class="bouton">Revenir en arrière</button>
    </div>


    <script src="js/darkMode.js"></script>
    <script src="js/refreshCharts.js"></script>
  </body>

  </html>

<?php } }?>