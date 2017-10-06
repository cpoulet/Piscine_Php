<?php
session_start();
($_SESSION['admin'] == true and $_SESSION['logged'] !== "") or die('<strong>You Should not be here!</strong>');
include('Template/header.php');
include('Template/nav.php');
include('Model/Cmds.php');
$data = getCmd();
?>
<div class="txt-heading">Commands</div>
<ul class="niv1">
<?php foreach($data as $cmd) { ?>
	<li>
		<?php echo "Command from ".$cmd['login']; ?>
		<ul class="niv2">
		<?php foreach($cmd['cmd'] as $art) { ?>
			<li>
			<?php echo	"<span class=\"alignleft\">Article: " . $art['name'] . "</span>" .
						"<span class=\"alignright\">Qty: " . $art['qty'] . "</span>"; ?>
			</li>
		<?php } ?>
		</ul>
	</li>
<?php } ?>
</ul>
