<?php
	include 'connection.php';

	$studid = $_POST['studid'];
	$subid = $_POST['subid'];
	$grd = $_POST['grd'];
	$schlyr = $_POST['schlyr'];
	$sem = $_POST['sem'];

	$sql = "UPDATE student_subject SET subject_grade = '".$grd."' WHERE student_id = '".$studid."' AND subject_id = '".$subid."' AND student_schlyr_id = '".$schlyr."' AND semester = '".$sem."'";
	if($conn->query($sql)==true)
		echo '<div class="alert alert-success" role="alert">Successfully updated</div>';
	else
		echo '<div class="alert alert-danger" role="alert">ERROR - Try again later</div>';
?>