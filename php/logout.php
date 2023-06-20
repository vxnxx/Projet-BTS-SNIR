<?php
session_start();
session_destroy();
header('Location: http://172.10.10.56/AirQuality/index.php');
?>