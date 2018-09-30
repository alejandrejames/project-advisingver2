<?php
	include 'connection.php';

	$accid = $_POST['accid'];
	$oldpass = $_POST['oldpass'];
	$newpass = $_POST['newpass'];
	$newpassconf = $_POST['newpassconf'];

	$sql = "SELECT account_pass FROM account WHERE account_id = '".$accid."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($row['account_pass'] == $oldpass){
		if(($newpass == $newpassconf) || ($newpass!="") || ($newpassconf!="")){
			$sql = "UPDATE account SET account_pass = '".$newpass."' WHERE account_id = '".$accid."'";
			if($conn->query($sql)==true)
				echo '<div class="alert alert-success" role="alert">Password Updated</div>';
			else
				echo '<div class="alert alert-danger" role="alert">ERROR - Try again later</div>';
		}
		else
			echo '<div class="alert alert-danger" role="alert">Confirm New Password</div>';
	}
	else
		echo '<div class="alert alert-danger" role="alert">Old Password Incorrect</div>';
?>