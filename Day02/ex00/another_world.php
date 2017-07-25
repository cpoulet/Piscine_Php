#!/usr/bin/php
<?php

function another_world($str)
{
	$pattern = '/[\s]+/';
	echo preg_replace($pattern, ' ', $str);
}
$str = trim($argv[1]);
another_world($str);
print("\n");
?>
