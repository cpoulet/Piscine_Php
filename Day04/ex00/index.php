<?php
session_start();
if ($_GET['login'] !== False and $_GET['passwd'] != False and $_GET['submit'] === "OK") {
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
$login = $_SESSION['login'];
$pass = $_SESSION['passwd'];
echo	"<html><body>\n".
	"<form method = \"get\">\n".
	"Identifiant: <input type=\"text\" name=\"login\" value=\"$login\" />\n".
	"<br />\n".
	"Mot de passe: <input type=\"text\" name=\"passwd\" value=\"$pass\" />\n".
	"<input type=\"submit\" name=\"submit\" value=\"OK\" />\n".
	"</form>\n".
	"</body></html>";
?>
