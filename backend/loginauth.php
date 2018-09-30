<?php
	include 'connection.php';

	$username = $_POST['username'];
	$pass = $_POST['pass'];

	$sql = "SELECT * FROM account WHERE account_usern = '".$username."' AND account_pass = '".$pass."'";
	$result = $conn->query($sql);
	if(mysqli_num_rows($result) != 0){
		$row = $result->fetch_assoc();
		echo 'Success';
		session_start();
		$_SESSION['accid'] = $row['account_id'];
	}
	else
		echo 'Failed';
?>