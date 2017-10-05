<?php
session_start();
$_SESSION['loggued'] = "";
require_once 'Config.php';
include('Template/header.php');
include('Template/nav.php');

$mysqli = new mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASS, Config::DB_NAME);

if (mysqli_connect_errno()) {
    printf("Echec de la connection : %s\n", mysqli_connect_error());
    exit();
}

$sql_cmd = file_get_contents('install.sql');

if ($mysqli->multi_query($sql_cmd))
	echo	"<br><strong>Installation Success</strong>";
else
	echo	"<br><strong>Installation Failed</strong>";
$mysqli->close();

?>
