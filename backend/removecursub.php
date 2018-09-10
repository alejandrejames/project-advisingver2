<?php
	include 'connection.php';

	$currid = $_POST['currid'];
	$subid = $_POST['subid'];

	$sql = "DELETE FROM subject_curriculum WHERE curriculum_id = '".$currid."' AND subject_id = '".$subid."'";
	$conn->query($sql);
	echo 'Success';
?>