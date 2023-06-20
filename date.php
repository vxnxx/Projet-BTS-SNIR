<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js" integrity="sha512-K/oyQtMXpxI4+K0W7H25UopjM8pzq0yrVdFdG21Fh5dBe91I40pDd9A4lzNlHPHBIP2cwZuoxaUSX0GJSObvGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
  <title>Choisir la date</title>
</head>

<body>
  <!-- Logo cliquable qui redirige vers la page d'accueil -->
  <div class="svgDiv" onclick="window.location.href = 'http://172.10.10.56/AirQuality/site.php';">
    <svg class="logoSvg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 826.21 275.25">
      <defs></defs>
      <g id="Calque_2" data-name="Calque 2">
        <g id="Calque_2-2" data-name="Calque 2">
          <!-- Forme du logo -->
          <path class="cls-1" d="M206,5V123.5c0,15.5-30,35.5-89,54.5s-93,30-94,75c-7.45-6.62-12.54-12.25-16-17.61a43.28,43.28,0,0,1-3.27-6C2.47,223.07,1.18,211.49.5,190.67.19,181.17,0,169.74,0,156q0-7.89.36-15a201.41,201.41,0,0,1,3.49-29.52c.57-2.82,1.19-5.52,1.88-8.11C17.22,89.6,44.52,72,79,60c16.59-5.77,36.18-11.93,55-18.39l.5-.17C167.67,30,198.37,17.73,206,5Z" />
          <!-- Couleur du logo -->
          <path class="cls-2" d="M134.5,0V107.5C134.5,129,113,147,91,157S7.42,175,7,235.39a43.28,43.28,0,0,1-3.27-6C2.47,223.07,1.18,211.49.5,190.67.19,181.17,0,169.74,0,156q0-7.89.36-15a201.41,201.41,0,0,1,3.49-29.52c.57-2.82,1.19-5.52,1.88-8.11C17.34,59.07,45.09,47.69,74,34,112,16,134.5,0,134.5,0Z" />
          <!-- Texte du logo -->
          <text class="cls-3" transform="translate(189.06 233.49)">
            AirQuality
          </text>
        </g>
      </g>
    </svg>
  </div>
  <!-- Bouton pour activer/désactiver le mode sombre -->
  <div class="darkmode-btn">
    <img id="img" class="img-in-box" src="img/dark.png" onclick="tgm()">
  </div>

  <form class="logout" action="http://172.10.10.56/AirQuality/php/logout.php" method="post">
      <input class="" type="submit" value="Se déconnecter" name="deconnexion" />
    </form>

  <!-- Script pour garder le mode sombre activé/désactivé -->
  <script src="js/keepDarkMode.js"></script>
  <form class="form mt-2 center" action="php/datePick.php" method="post">

    <!-- Titre de la page -->
    <label class="phpLabel" id="topLive">Veuillez choisir la salle et la date pour laquelle vous désirez voir l'historique</label>

    <!-- Sélection de la salle de classe -->
    <select class="classeSelect hist mb-2" name="classeSelect">
      <option value="">Selectionnez votre salle de classe</option>"
      <option value="C204">C204</option>
      <option value="C205">C205</option>
    </select>

    <!-- Sélection de la date -->
    <label class="phpLabel">Veuillez choisir la date</label>
    <div class="flat">
    <input type="text" class="flatpickr mb-2" id="flatpickr" name="date">
    </div>
    <input type="submit" value="Choisir la date">
    <div class="selectDiv">


    </div>
  </form>
  <!-- Script pour activer/désactiver le mode sombre -->
  <script src="js/darkMode.js"></script>

  <!-- Script pour afficher le calendrier -->
  <script>
    flatpickr(".flatpickr", {
      locale: "fr",
      dateFormat: "Y-m-d",
    });
  </script>
</body>

</html>