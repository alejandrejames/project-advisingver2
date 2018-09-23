<?php
	include 'backend/connection.php';
	$pagelvl = '1';
?><!DOCTYPE html>
<html>
	<head>
		<title>Student Advising System Ver: 2.0</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		
	</head>
	<body>
		<!--Header-->
		<?php include 'globalincludes/header.php';?>
		<!--Header-->

		<div class="container-fluid">
			<ol class="breadcrumb">
			  <li class="active"><a href="">Home</a></li>
			</ol>
			<div class="form-group">
          		<input type="text" class="form-control" placeholder="Search">
        	</div>
        	<div class="btn-group btn-group-justified" role="group" aria-label="...">
			  <div class="btn-group" role="group">
			    <button type="submit" class="btn btn-default">Submit</button>
			  </div>
			</div>
			<div class="recents">
				<div class="page-header">
			  		<h1>Recent</h1>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Recent Students</h3>
					  </div>
					  <div class="panel-body">
					    <div class="list-group">
					      <?php
					      	$sql = "SELECT * FROM students";
					      	$result = 1;
					      ?>
						  <a href="#" class="list-group-item">Cras justo odio</a>
						  <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
						  <a href="#" class="list-group-item">Morbi leo risus</a>
						  <a href="#" class="list-group-item">Porta ac consectetur ac</a>
						  <a href="#" class="list-group-item">Vestibulum at eros</a>
						</div>
					  </div>
					</div>
				</div>
				<!--2nd Panel-->
				<div class="col-md-4">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Recent Subjects</h3>
					  </div>
					  <div class="panel-body">
					    <div class="list-group">
						  <a href="#" class="list-group-item">Cras justo odio</a>
						  <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
						  <a href="#" class="list-group-item">Morbi leo risus</a>
						  <a href="#" class="list-group-item">Porta ac consectetur ac</a>
						  <a href="#" class="list-group-item">Vestibulum at eros</a>
						</div>
					  </div>
					</div>
				</div>
				<!--3rd Panel-->
				<div class="col-md-4">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Recent Curriculums</h3>
					  </div>
					  <div class="panel-body">
					    <div class="list-group">
						  <a href="#" class="list-group-item">Cras justo odio</a>
						  <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
						  <a href="#" class="list-group-item">Morbi leo risus</a>
						  <a href="#" class="list-group-item">Porta ac consectetur ac</a>
						  <a href="#" class="list-group-item">Vestibulum at eros</a>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	<!--Scripts-->
	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/create.js"></script>
	<script type="text/javascript" src="js/userdeffunc.js"></script>
	</body>
</html>