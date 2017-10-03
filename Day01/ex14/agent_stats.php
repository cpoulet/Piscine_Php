#!/usr/bin/php
<?php

function getScore() {
	$header = fgetcsv(STDIN, 100, ";");
	$notes = [];
	$mouli = [];
	while (($l = fgetcsv(STDIN, 100, ";"))) {
		if (count($l) != 4)
			continue;
		if ($l[1] == '')
			continue;
		if ($l[2] == 'moulinette') {
			$mouli[$l[0]] = $l[1];
			continue;
		}
		if (array_key_exists($l[0], $notes)) {
			array_push($notes[$l[0]], $l[1]);
		} else {
			$notes[$l[0]] = [$l[1]];
		}
	}
	ksort($notes);
	return ['score' => $notes, 'moulinette' => $mouli];
}

function moyenne($scores) {
	$nb = 0;
	$sum = 0;
	foreach($scores as $key => $value) {
		$nb += count($value);
		$sum += array_sum($value);
	}
	print($sum / $nb) . PHP_EOL;
}

function moyenne_user($scores) {
	foreach($scores as $key => $value)
		print ("$key:" . array_sum($value) / count($value) . PHP_EOL);
}

function ecart_mouli($scores, $mouli) {
	foreach($scores as $key => $value) {
		$ecart = 0;
		foreach($value as $v) {
			$ecart += $v - $mouli[$key];
		}
		$ecart /= count($value);
		print ("$key:$ecart\n");
	}
}

$argc == 2 or die;
$data = getScore();
switch (trim($argv[1])) {
	case "moyenne":
		moyenne($data['score']);
		break;
	case "moyenne_user":
		moyenne_user($data['score']);
		break;
	case "ecart_moulinette":
		ecart_mouli($data['score'], $data['moulinette']);
		break;
	default:
		die;
}
?>
