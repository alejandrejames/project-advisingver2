<?php
	include 'connection.php';

	$subid = $_POST['subid'];
	$preq = $_POST['preq'];

	$sql = "INSERT INTO subject_preq SET subject_id = '".$subid."', subject_id_preq = '".$preq."'";
	$conn->query($sql);
	echo 'Success';
?>