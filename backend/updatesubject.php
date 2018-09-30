<?php
		include 'connection.php';

		$subid = $_POST['subid'];
		$subcode = $_POST['subcode'];
		$subname = $_POST['subname'];
		$labunits = $_POST['labunits'];
		$lecunits = $_POST['lecunits'];
		$creditunits = $_POST['creditunits'];

		$sql = "UPDATE subject SET subject_name = '".$subcode."', subject_description = '".$subname."', lecture_unit = '".$lecunits."', lab_unit = '".$labunits."', credit_unit = '".$creditunits."' WHERE subject_id = '".$subid."'";
		if($conn->query($sql)==true)
			echo '<div class="alert alert-success" role="alert">Successfully updated</div>';
		else
			echo '<div class="alert alert-danger" role="alert">ERROR - Try again later</div>';
?>