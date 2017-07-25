#!/usr/bin/php
<?php

function loupe($str)
{
	$pattern = '/.*(href=http).*title="(.*)".*/i';
	preg_match($pattern, $str, $matches);
	if (empty($matches[0])) {
		echo ("Wrong Format\n");
		exit ;
	}
	echo ("$matches[1]\n");
	echo ("$matches[2]\n");
	echo ("$matches[3]\n");
	echo ("$matches[4]\n");
	echo ("$matches[5]\n");
	echo ("$matches[6]\n");
	echo ("$matches[7]\n");
}
$str = trim($argv[1]);
loupe($str);
?>


# .*<a.*title="(.*)".*<\/a>.*


# <a[^>]*>([^<]*)<.*\/a>
