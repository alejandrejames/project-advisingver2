<?php
	include 'connection.php';

	$currid = $_POST['currid'];
	$yrlvl = $_POST['yrlvl'];
	$sem = $_POST['sem'];
	$subid = $_POST['subid'];

	$sql = "INSERT INTO subject_curriculum SET subject_id = '".$subid."', curriculum_id = '".$currid."', subject_yrlvl = '".$yrlvl."', subject_semester = '".$sem."'";
	$conn->query($sql);
	echo "Added";
?>