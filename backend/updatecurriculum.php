<?php
	include 'connection.php';

	$currname = $_POST['currname'];
	$collid = $_POST['college'];
	$currid = $_POST['currid'];

	$sql = "UPDATE curriculum SET curriculum_name = '".$currname."', college_id = '".$collid."' WHERE curriculum_id = '".$currid."'";
	if($conn->query($sql)==true)
		echo '<div class="alert alert-success" role="alert">Successfully updated</div>';
	else
		echo '<div class="alert alert-danger" role="alert">ERROR - Try again later</div>';
?>