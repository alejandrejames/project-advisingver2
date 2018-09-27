<?php
	include 'connection.php';

	$studid = $_POST['studid'];
	$currid = $_POST['currid'];
	$schlyr = $_POST['schlyr'];
	$yrlvl = $_POST['yrlvl'];
	$sem = $_POST['sem'];
	$subid = $_POST['subid'];

	$sql = "DELETE FROM student_subject WHERE student_id = '".$studid."' AND curriculum_id = '".$currid."' AND subject_id = '".$subid."' AND student_schlyr_id = '".$schlyr."' AND year_level = '".$yrlvl."'AND semester = '".$sem."'";

	if($conn->query($sql) == true)
		echo 'Success';
	else
		echo 'Failed'.$sql;
?>