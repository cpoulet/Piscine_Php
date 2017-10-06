<?php
session_start();
$_SESSION['loggued'] = "";
require_once 'Config.php';
include('Template/header.php');
include('Template/nav.php');
error_reporting(E_ERROR);

$mysqli = new mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASS);

if (mysqli_connect_errno()) {
    printf("<br><strong>Echec de la connection : %s<strong>", mysqli_connect_error());
    exit();
}

$sql_cmd = file_get_contents('install.sql');

if ($mysqli->multi_query($sql_cmd))
	echo	"<br><strong>Installation Success</strong>";
else
	echo	"<br><strong>Installation Failed</strong>";
$mysqli->close();

?>
