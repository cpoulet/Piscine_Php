<?php

if(isset($_POST['submit'])) {
	if($_POST['submit'] === "OK" and $_POST['login'] !== "" and $_POST['passwd'] !== "") 	{
		$dir = 'private/';
		$file = $dir . 'passwd';
		$user = ['login' => $_POST['login'], 'passwd' => hash('whirlpool', $_POST['passwd'])];
	 	file_exists($dir) or mkdir($dir);
		if (file_exists($file)) {
			$data = unserialize(file_get_contents($file));
			foreach($data as $account)
				$_POST['login'] !== $account['login'] or die("ERROR\n");
		}
		$data[] = $user;
		file_put_contents($file, serialize($data));
		echo "OK\n";
	}
	else
		die("ERROR\n");
}
?>
