<?php
	include 'connection.php';

	$subid = $_POST['subid'];
	$preq = $_POST['preq'];
	$currid = $_POST['currid'];

	$sql = "INSERT INTO subject_preq SET subject_id = '".$subid."', subject_id_preq = '".$preq."', curriculum_id = '".$currid."'";
	if($conn->query($sql)==true)
		echo '<div class="alert alert-success" role="alert">Success</div>';
	else
		echo '<div class="alert alert-danger" role="alert">ERROR - Unable to insert</div>';
?>