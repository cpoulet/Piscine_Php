<?php
session_start();
isset($_SESSION['logged']) or $_SESSION['logged'] = "";
isset($_SESSION['admin']) or $_SESSION['admin'] = false;
?>
<nav>
    <a href="index.php">Home</a> |
<?php if ($_SESSION['admin'] === true) { ?>
	<a href="install.php">Install</a> |
	<a href="commands.php">Commands</a> |
<?php } ?>
<?php if ($_SESSION['logged'] === "") { ?>
	<a href="login.php">Login</a>
<?php } else {
	echo "You are logged as ". $_SESSION['logged']; ?>
	 | <a href="logout.php">Logout</a>
<?php } ?>
</nav>
