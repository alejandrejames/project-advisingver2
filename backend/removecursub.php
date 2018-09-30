<?php
	include 'connection.php';

	$currid = $_POST['currid'];
	$subid = $_POST['subid'];

	$sql = "DELETE FROM subject_curriculum WHERE curriculum_id = '".$currid."' AND subject_id = '".$subid."'";
	if($conn->query($sql)==true)
		echo '<div class="alert alert-success" role="alert">Successfully removed</div>';
	else
		echo '<div class="alert alert-danger" role="alert">ERROR - Try again later</div>';
?>