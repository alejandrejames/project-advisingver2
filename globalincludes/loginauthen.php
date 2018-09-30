<?php
	session_start();

	if(!isset($_SESSION['accid'])){
		switch ($pagelvl) {
			case '1':
				header("Location: login/login.php");
				break;
			case '2':
				header("Location: ../login/login.php");
				break;
			default:
				# code...
				break;
		}
	}
	else{
		switch ($pagelvl) {
			case '3':
				header("Location: ../index.php");
				break;
			default:
				# code...
				break;
		}

		$sql = "SELECT * FROM account,acc_type WHERE account.acc_type_id = acc_type.acc_type_id AND account_id = '".$_SESSION['accid']."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		$accuname = $row['account_usern'];
		$accpass = $row['account_pass'];
		$accfname = $row['acc_fname'];
		$acclname = $row['acc_lname'];
		$acctyid = $row['acc_type_id'];
		$acctyname = $row['acc_type_name'];
	}

?>