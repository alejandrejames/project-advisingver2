<?php
	include 'connection.php';

	$accid = $_POST['accid'];
	$accuname = $_POST['accuname'];
	$accfname = $_POST['accfname'];
	$acclname = $_POST['acclname'];

	$sql = "UPDATE account SET account_usern = '".$accuname."', acc_fname = '".$accfname."', acc_lname = '".$acclname."' WHERE account_id = '".$accid."'";

	if($conn->query($sql)==true)
		echo '<div class="alert alert-success" role="alert">Successfully updated</div>';
	else
		echo '<div class="alert alert-danger" role="alert">ERROR - Try again later</div>';
?>