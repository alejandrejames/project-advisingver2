<?php
	include 'connection.php';

	$studid1 = $_POST['studid1'];
	$studid = $_POST['studid'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$yrlvl = $_POST['yrlvl'];
	$collid = $_POST['college'];
	$currid = $_POST['currid'];

	$sql = "UPDATE student SET student_id = '".$studid."', student_fname = '".$fname."', student_lname = '".$lname."', student_yrlvl = '".$yrlvl."', college_id = '".$collid."', curriculum_id = '".$currid."' WHERE student_id='".$studid1."'";
	$conn->query($sql);
	echo 'Success';
?>