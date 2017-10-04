<?php

function auth($login, $passwd) {
	$file = '../ex01/private/passwd';
	if (!file_exists($file)) return False;
	$data = unserialize(file_get_contents($file));
	foreach($data as &$account)
		if ($login === $account['login'])
			return $account['passwd'] === hash('whirlpool', $passwd) ? True : False;
	return False;
}

?>
