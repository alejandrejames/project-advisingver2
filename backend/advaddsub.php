<?php
	include 'connection.php';

	$studid = $_POST['studid'];
	$schlyr = $_POST['schlyr'];
	$subid = $_POST['subid'];
	$currid = $_POST['currid'];
	$yrlvl = $_POST['yrlvl'];
	$sem = $_POST['sem'];

	$sql = "INSERT INTO student_subject SET student_id = '".$studid."', subject_id = '".$subid."', student_schlyr_id = '".$schlyr."', curriculum_id = '".$currid."', semester = '".$sem."', year_level = '".$yrlvl."'";
	
	if($conn->query($sql) == true)
		echo 'Success';
	else
		echo 'Failed';
?>