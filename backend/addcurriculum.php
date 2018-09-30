<?php
	include 'connection.php';
	$currname = $_POST['curriculumname'];
	$collegeid = $_POST['collegeid'];

	$sql = "INSERT INTO curriculum SET curriculum_name = '".$currname."', college_id = '".$collegeid."'";
	if($conn->query($sql)==true)
		echo '<div class="alert alert-success" role="alert">Success</div>';
	else
		echo '<div class="alert alert-danger" role="alert">ERROR - Unable to insert</div>';
?>