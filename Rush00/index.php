<?php 
session_start();
include('Template/header.php');
include('Template/nav.php');
?>
<div class="txt-heading">Cart</div>
<div id="product-grid">
    <div class="txt-heading">Projects</div>
<?php require_once 'Model/Project.php';
    $P = new Project;
    $projects = $P->getAll();
    foreach ($projects as $p) { ?>
        <div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $p["id"]; ?>">
            <div><strong><?php echo $p["name"] ?></strong></div>
            <div class="product-image"><img src="<?php echo $p["image"] ?>"></div>
            <div class="product-price"><?php echo $p["price"] . "$" ?></div>
            <div class="product-description"><?php echo $p["description"] ?></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="AddCart" /></div>
			</form>
		</div> 
<?php }
?>
</div>
<?php include('Template/footer.php'); ?>
