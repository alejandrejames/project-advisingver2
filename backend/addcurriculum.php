<?php
	include 'connection.php';
	$currname = $_POST['curriculumname'];
	$collegeid = $_POST['collegeid'];

	$sql = "INSERT INTO curriculum SET curriculum_name = '".$currname."', college_id = '".$collegeid."'";
	$conn->query($sql);

	echo '<div class="alert alert-success" role="alert">Success</div>';
?>