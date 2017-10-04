<?php

if(isset($_POST['submit'])) {
	if ($_POST['submit'] === "OK" and $_POST['login'] !== "" and $_POST['oldpw'] !== "" and $_POST['newpw'] !== "") {
	 	$_POST['oldpw'] !== $_POST['newpw'] or die("ERROR\n");
		$file = '../ex01/private/passwd';
	 	file_exists($file) or die("ERROR\n");
		$data = unserialize(file_get_contents($file));
		foreach($data as &$account)
			if ($_POST['login'] === $account['login']) {
				$account['passwd'] === hash('whirlpool', $_POST['oldpw']) or die("ERROR\n");
				$account['passwd'] = hash('whirlpool', $_POST['newpw']);
				file_put_contents($file, serialize($data));
				echo "OK\n";
				exit(0);
			}
	}
	die("ERROR\n");
}

?>
