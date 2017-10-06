<?php
session_start();

function saveCmd() {
	$dir = 'private/';
	$file = $dir . 'cmds';
	$cmd = ['login' => $_SESSION['logged'], 'cmd' => $_SESSION['cart']];
	file_exists($dir) or mkdir($dir);
	if (file_exists($file))
		$data = unserialize(file_get_contents($file));
	$data[] = $cmd;
	file_put_contents($file, serialize($data));
	return True;
}

function getCmd() {
	$file = 'private/cmds';
	file_exists($file) or die("<strong>There is no commands, RIP</strong>\n");
	return unserialize(file_get_contents($file));
}
?>
