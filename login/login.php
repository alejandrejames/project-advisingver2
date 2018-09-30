<?php
	include '../backend/connection.php';
	$pagelvl = '3';
	include '../globalincludes/loginauthen.php';
?><!DOCTYPE html>
<html>
	<head>
		<title>Student Advising System Ver: 2.0</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
		
	</head>
	<body>
		<!--Header-->
		<?php include '../globalincludes/header.php';?>
		<!--Header-->

		<div class="container-fluid">
			<div class="col-md-12"><BR></div>
			<div class="container-fluid srch-rslt">
				<div class="col-md-12" id="notif-area"></div>
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<center>
						<form class="form-signin">
        					<h2 class="form-signin-heading">Please sign in</h2>
        					<label for="inputEmail" class="sr-only">Email address</label>
        						<input type="email" class="form-control" placeholder="Username" id="loginusername" required autofocus>
        					<label for="inputPassword" class="sr-only">Password</label>
        						<input type="password" class="form-control" id="loginpass" placeholder="Password" required>
        					<button class="btn btn-lg btn-primary btn-block" type="button" id="loginbut">Sign in</button>
      					</form>
  					</center>
				</div>
			</div>
		</div>
	<!--Scripts-->
	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/create.js"></script>
	<script type="text/javascript" src="../js/userdeffunc.js"></script>
	<script type="text/javascript" src="../js/login.js"></script>
	</body>
</html>