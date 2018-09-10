<?php
		include 'connection.php';

		$subid = $_POST['subid'];
		$subcode = $_POST['subcode'];
		$subname = $_POST['subname'];
		$labunits = $_POST['labunits'];
		$lecunits = $_POST['lecunits'];
		$creditunits = $_POST['creditunits'];

		$sql = "UPDATE subject SET subject_name = '".$subcode."', subject_description = '".$subname."', lecture_unit = '".$lecunits."', lab_unit = '".$labunits."', credit_unit = '".$creditunits."' WHERE subject_id = '".$subid."'";
		$conn->query($sql);

		echo 'Success';
?>