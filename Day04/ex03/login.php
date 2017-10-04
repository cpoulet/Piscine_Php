<?php
include('auth.php');
session_start();
$_SESSION['loggued_on_user'] = auth($_GET['login'], $_GET['passwd']) ? $_GET['login'] : "";
echo $_SESSION['loggued_on_user'] !== "" ? "OK\n" : "ERROR\n";
?>
