#!/usr/bin/php
<?php
function another_world($str)
{
	$pattern = '/[\s]+/';
	echo preg_replace($pattern, ' ', $str)."\n";
}
if ($argc < 2)
    return (1);
$str = trim($argv[1]);
another_world($str);
?>
