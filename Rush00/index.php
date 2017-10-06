<?php 
session_start();
isset($_SESSION['logged']) or $_SESSION['logged'] = "";
isset($_SESSION['admin']) or $_SESSION['admin'] = false;
isset($_SESSION['cart']) or $_SESSION['cart'] = [];
isset($_SESSION['total']) or $_SESSION['total'] = 0;
include('Template/header.php');
include('Template/nav.php');
include_once('Cart.php'); ?>
<div class="txt-heading">My 42 Market</div>
<?php
if ($_GET['action'] === "add" and $_POST['qty'] > 0)
	addCart($_GET['id'], intval($_POST['qty']));
if (isset($_POST['delete']))
	deleteCart();
if (isset($_POST['validate'])) {
	if ($_SESSION['total'] === 0)
		echo "<strong>The cart is empty...</strong>";
	elseif ($_SESSION['logged'] === "")
		echo "<strong>You must be logged in before validate your cart...</strong>";
}
?>
<div class="txt-heading">Cart</div>
<ul class="list">
<?php
	if (count($_SESSION['cart']) !== 0) {
		foreach ($_SESSION['cart'] as $article) { ?>
			<li><?php echo $article["name"] ?></li>
			<li><?php echo 'x'.$article["qty"] ?></li>
			<li><?php echo $article["price"].'$' ?></li>
		<?php } ?>
	 		<li>Total</li>
			<li></li>
			<li><?php echo $_SESSION['total'].'$'; ?></li>
</ul>
<form method="post" action="index.php">
	<input type="submit" name="delete" value="delete" class='DeleteCart'>
	<input type="submit" name="validate" value="validate" class='ValidateCart'>
</form>
<?php
	} else
		echo "<strong>The cart is empty.</strong>"
?>
<div id="product-grid">
	<div class="txt-heading">Projects</div>
<div>Sorting & Categories :</div>
<?php require_once 'Model/Project.php';
    $P = new Project;
    $projects = $P->getAll();
    foreach ($projects as $p) { ?>
        <div class="product-item">
			<form method="post" action="index.php?action=add&id=<?php echo $p["id"]; ?>">
            <div><strong><?php echo $p["name"] ?></strong></div>
            <div class="product-image"><img src="<?php echo $p["image"] ?>"></div>
            <div class="product-price"><?php echo $p["price"] . "$" ?></div>
            <div class="product-description"><?php echo $p["description"] ?></div>
			<div><input type="number" name="qty" value="1" size="2" /><input type="submit" value="add" class="AddCart" /></div>
			</form>
		</div> 
<?php } ?>
</div>
<?php include('Template/footer.php'); ?>
