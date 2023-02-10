<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$select = $_POST['classeSelect'];
$login = $_SESSION['utilisateur'];

echo("Vous etes $login et vous avez choisis la classe n°$select");
?>

<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>

<canvas id="tempChart" style="width:100%;max-width:600px"></canvas>

<canvas id="co2Chart" style="width:100%;max-width:600px"></canvas>


<script>
new Chart("tempChart", {
  type: "line",
  data: {
    labels: [1,2,3,4,5,6,7,8,9,10],
    datasets: [{
      data: [15,15,18.5,20,22,24,0,5,45,8,],
      borderColor: "magenta",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});

new Chart("co2Chart", {
  type: "line",
  data: {
    labels: [1,2,3,4,5,6,7,8,9,10],
    datasets: [{ 
      data: [0,5,10,15,20,25,30,35,40,45],
      borderColor: "black",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});


</script>
