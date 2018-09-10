<?php
	include 'connection.php';

	$subid = $_POST['subid'];
	$preq = $_POST['preq'];

	$sql = "DELETE FROM subject_preq WHERE subject_id = '".$subid."' AND subject_id_preq = '".$preq."'";
	$conn->query($sql);
	echo 'Success';

?>