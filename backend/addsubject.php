<?php
	include 'connection.php';

	$subcode = $_POST['subcode'];
	$subdesc = $_POST['subdesc'];
	$labunits = $_POST['labunits'];
	$lectunits = $_POST['lectunits'];
	$credit = $_POST['credit'];

	$sql = "SELECT COUNT(subject_id) as total FROM subject";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		$total = $row['total'];
	}
	$total++;
	$sql = "INSERT INTO subject SET subject_id = '".$total."', subject_name = '".$subcode."', subject_description = '".$subdesc."', lecture_unit = '".$lectunits."', lab_unit = '".$labunits."', credit_unit = '".$credit."'";
	if($conn->query($sql)==true)
		echo '<div class="alert alert-success" role="alert">Success</div>';
	else
		echo '<div class="alert alert-danger" role="alert">ERROR - Unable to insert</div>';
?>