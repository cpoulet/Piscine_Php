<?php
session_start();
require_once 'Model/Project.php';

function addCart($id, $qty) {
	if (isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id]['qty'] += $qty;
		$_SESSION['total'] += $_SESSION['cart'][$id]['price'] * $qty;
	} else {
		$P = new Project;
		$out = $P->getid($id);
		if ($out !== False) {
			$out['qty'] = $qty;
			$_SESSION['cart'][$id] = $out;
			$_SESSION['total'] += floatval($out['price']) * $qty;
		}
	}
}

function removeCart($id, $qty) {
	if (isset($_SESSION['cart'][$id]))
		$_SESSION['cart'][$id]['qty'] += $qty;
	else {
		$P = new Project;
		$out = $P->getid($id)[0];
		if ($out !== False) {
			$out['qty'] = intval($qty);
			$_SESSION['cart'][$id] = $out;
		}
	}
}

function deleteCart() {
	$_SESSION['cart'] = [];
	$_SESSION['total'] = 0;
}
?>
