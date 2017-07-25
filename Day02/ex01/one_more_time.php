#!/usr/bin/php
<?php

function one_more_time($str)
{
	$pattern = '/^(Lundi|Mardi|Mercredi|Jeudi|Vendredi|Samedi|Dimanche) ([0-9]{1,2}) (janvier|fevrier|mars|avril|mai|juin|juillet|aout|septembre|octobre|novembre|decembre) ([0-9]{4}) ([0-9]{2}:[0-9]{2}:[0-9]{2})$/i';
	preg_match($pattern, $str, $matches);
	if (empty($matches[0])) {
		echo ("Wrong Format\n");
		exit ;
	}
	$months[0] = '/janvier/i';
	$months[1] = '/fevrier/i';
	$months[2] = '/mars/i';
	$months[3] = '/avril/i';
	$months[4] = '/mai/i';
	$months[5] = '/juin/i';
	$months[6] = '/juillet/i';
	$months[7] = '/aout/i';
	$months[8] = '/septembre/i';
	$months[9] = '/octobre/i';
	$months[10] = '/novembre/i';
	$months[11] = '/decembre/i';
	$array = range (1,12);
	$matches[3] =  preg_replace($months, $array, $matches[3]);
	$date = "$matches[3]/$matches[2]/$matches[4] $matches[5]";
	echo ("$date\n");
	date_default_timezone_set('Europe/Berlin');
	$count = strtotime($date);
	echo ("$count\n");
}
$str = trim($argv[1]);
one_more_time($str);
?>
