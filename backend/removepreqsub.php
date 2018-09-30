<?php
	include 'connection.php';

	$subid = $_POST['subid'];
	$preq = $_POST['preq'];

	$sql = "DELETE FROM subject_preq WHERE subject_id = '".$subid."' AND subject_id_preq = '".$preq."'";
	if($conn->query($sql)==true)
		echo '<div class="alert alert-success" role="alert">Successfully removed</div>';
	else
		echo '<div class="alert alert-danger" role="alert">ERROR - Try again later</div>';

?>