<?php
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
      <a href="http://172.10.10.54/pbs/index.html">
        <button class="bouton" type="button">Retourner a l'accueil</button>
      </a>
    </div>
  </body>

  </html>
<?php
} else {
?>

  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AirQuality</title>
    <link rel="stylesheet" href="styles.css">
  </head>

  <body>
    <form class="form" action="http://172.10.10.54/pbs/test2.php" method="post">
      <div class="usernameDiv">
        <label class="loginLabel">Salle</label>
        <select class="" name="classeSelect">
          <option value="">Selectionnez votre salle de classe</option>"
          <option value="C204">C204</option>
          <option value="C205">C205</option>
        </select>
      </div>
      <div class="passwordDiv">
      </div>
      <input type="submit" value="Choisir ma salle" name="envoi" />
    </form>
  </body>

  </html>

<?php
}
?>