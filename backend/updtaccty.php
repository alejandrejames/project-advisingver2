<?php
	include 'connection.php';

	$accid = $_POST['accid'];
	$acctyid = $_POST['acctyid'];
	$accstat = $_POST['accstat'];

	$sql = "UPDATE account SET acc_type_id = '".$acctyid."', acc_status = '".$accstat."' WHERE account_id = '".$accid."'";
	if($conn->query($sql)==true)
		echo '<div class="alert alert-success" role="alert">Updated</div>';
	else
		echo '<div class="alert alert-danger" role="alert">ERROR - Try again</div>';
?>