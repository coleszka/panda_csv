<?php
session_start();
require_once 'db.php';
require_once 'uploadCsv.php';
require_once 'viewChart.php';

$saveJson = new ViewChart();
$saveJson->howManyCountries();
$saveJson->countCountries();
//echo '<pre>' . var_export($saveJson->countCountries(), true) . '</pre>';
$saveJson->saveJson();
$saveJson->addDataToDb();

?>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="../js/chart.js" type="text/javascript"></script>
<div id="chartContainer" style="height: 360px; width: 100%;"></div>
