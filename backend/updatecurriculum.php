<?php
	include 'connection.php';

	$currname = $_POST['currname'];
	$collid = $_POST['college'];
	$currid = $_POST['currid'];

	$sql = "UPDATE curriculum SET curriculum_name = '".$currname."', college_id = '".$collid."' WHERE curriculum_id = '".$currid."'";
	$conn->query($sql);
	echo 'Success';
?>