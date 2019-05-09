<?php
session_start();
require_once 'db.php';
require_once 'uploadCsv.php';
$dir = "../../upload/";
$dir_file = $dir . basename($_FILES["file"]["name"]);

$uploadCSV = new UploadCsv($dir_file);
$uploadCSV->checkFile();
?>
