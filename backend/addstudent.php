<?php
	include 'connection.php';
	
	$studid = $_POST['studid'];
	$fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $collegeid = $_POST['collegeid'];
    $curriculum = $_POST['curriculum'];
	$yrlvl = $_POST['yrlvl'];

	$sql = "INSERT INTO student SET student_id='".$studid."', student_fname='".$fname."', student_lname='".$lname."', student_yrlvl='".$yrlvl."', college_id='".$collegeid."', curriculum_id='".$curriculum."'";
	if($conn->query($sql)==true)
		echo '<div class="alert alert-success" role="alert">Success</div>';
	else
		echo '<div class="alert alert-danger" role="alert">ERROR - Unable to insert</div>';
?>