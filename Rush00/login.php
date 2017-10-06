<?php
session_start();
include('Template/header.php');
include('Template/nav.php');
include_once 'Model/User.php';

$word = "already";

if(isset($_POST['submit']) or isset($_POST['create'])) {
	if($_POST['login'] !== "" and $_POST['passwd'] !== "") 	{
		$U = new User;
		if($_POST['submit'] === "login") {
			if ($U->login($_POST['login'], $_POST['passwd']) === True) {
				$_SESSION['logged'] = $_POST['login'];
				if ($U->isadmin($_POST['login']))
					$_SESSION['admin'] = true;
				$word = "now";
			} else 
				echo "<strong>Error: Wrong username or password</strong>";
		} elseif($_POST['create'] === "create") {
			if ($U->create($_POST['login'], $_POST['passwd']) === True) {
				$_SESSION['logged'] = $_POST['login'];
				$word = "now";
			} else 
				echo "<strong>Error: This login already exists</strong>";
		}
	}
}
if ($_SESSION['logged'] !== "") {
	echo 	"<br>You are $word connected as " . $_SESSION['logged'] .
			"<br><a href=\"logout.php\">Logout</a>";
} else {
?>
  <br>
	<form action="login.php" method = "post">
		Login : <input type="text" name="login" value="" />
		<br />
		Password : <input type="text" name="passwd" value="" />
		<input type="submit" name="submit" value="login" />
		<br>
		Create user :
		<input type="submit" name="create" value="create" />
	</form>
  </body>
</html>
<?php }
?>
<?php include('Template/footer.php'); ?>
