<?php
	include '../backend/connection.php';
	$pagelvl = "2";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Student Advising System Ver: 2.0</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
		
	</head>
	<body>
		<!--Navbar-->
		<?php include '../globalincludes/header.php';?>
		<!--Navbar end-->

		<div class="container-fluid">
			<ol class="breadcrumb">
			  <li><a href="../index.php">Home</a></li>
			  <li><a href="../view/students.php">All Students</a></li>
			  <li class="active">Name of Student</li>
			</ol>			
		</div>
	<!--Scripts-->
	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	</body>
</html>