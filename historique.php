<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$listHoraires = $_SESSION['listHoraires'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="styles.css" />
    <title>AirQuality</title>
</head>

<body>
    <script type='text/javascript'>
        var listHoraires = <?php echo json_encode($listHoraires); ?>;
        console.log(listHoraires);
    </script>

<div class="canvasDiv loginLabel">
    <canvas id="tempChart" style="width:100%;max-width:600px"></canvas>
    <label class="phpLabel">Courbe de température</label>
  </div>
  <div class="canvasDiv loginLabel">
    <canvas id="co2Chart" style="width:100%;max-width:600px"></canvas>
    <label class="phpLabel">Taux de co2</label>
  </div>


  
  <script type='text/javascript'>
var compteur = [];
var total = 1;

for (let i = 0; i < listHoraires.length; i++) {
    compteur[i] = total;
    total++;
}

console.log(compteur);

    var tempChart = new Chart("tempChart", {
    type: "line",
    data: {
        labels: compteur,
        datasets: [{
        data: [],
        borderColor: "magenta",
        fill: false
        }]
    },
    options: {
        legend: {
        display: false
        }
    }
});

var co2Chart = new Chart("co2Chart", {
    type: "line",
    data: {
        labels: compteur,
        datasets: [{
        data: [],
        borderColor: "black",
        fill: false
        }]
    },
    options: {
        legend: {
        display: false
        }
    }
});
  </script>





</body>

</html>