<?php 
session_start();
include('Template/header.php');
include('Template/nav.php');
?>
<ul>
<?php require_once 'Model/Project.php';
    $P = new Project;
    $projects = $P->getAll();
    $image = "Image/Corewar.gif";
    foreach ($projects as $p) { ?>
        <li>
            <h3><?php echo $p[name] ?></h3>
            <img src="<?php echo $p[image] ?>" style="width: auto; height: auto;max-width: 360px;max-height: 300px">
            <p><?php echo $p[price] ?></p>
            <p><?php echo $p[description] ?></p>
        </li>
    <?php }
?>
</ul>
<?php include('Template/footer.php'); ?>
