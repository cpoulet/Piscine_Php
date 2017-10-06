<?php
session_start();
$_SESSION['logged'] = "";
$_SESSION['admin'] = false;
include('Template/header.php');
include('Template/nav.php');
?>
<p>Successfully log out.</p>
