<?php
	include 'connection.php';

	$newaccuname = $_POST['newaccuname'];
	$newaccfname = $_POST['newaccfname'];
	$newacclname = $_POST['newacclname'];
	$newacctyid = $_POST['newacctyid'];
	$newaccpass = $_POST['newaccpass'];
	$newaccpassconf = $_POST['newaccpassconf'];

	if(!empty($newaccpass)==true){
		if($newaccpass==$newaccpassconf){
			$sql = "INSERT into account SET account_usern = '".$newaccuname."', account_pass = '".$newaccpass."', acc_fname = '".$newaccfname."', acc_lname = '".$newacclname."', acc_type_id = '".$newacctyid."', acc_status = '1'";
			if($conn->query($sql)==true)
					echo '<div class="alert alert-success" role="alert">Success</div>';
				else
					echo '<div class="alert alert-danger" role="alert">ERROR - Unable to insert</div>';
		}
		else
			echo '<div class="alert alert-danger" role="alert">ERROR - Unable to insert</div>';
	}
	else
		echo '<div class="alert alert-danger" role="alert">ERROR - Unable to insert</div>';
?>