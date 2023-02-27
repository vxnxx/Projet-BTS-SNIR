<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$select = $_POST['classeSelect'];
$login = $_SESSION['utilisateur'];

echo ("<span class=\"center loginLabel phpLabel\">Vous etes $login et vous avez choisis la classe n°$select</span>");
?>

<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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