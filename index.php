<!DOCTYPE html>
<html>
	<head>
		<title>Student Advising System Ver: 2.0</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		
	</head>
	<body>
		<!--Navbar-->
		<nav class="navbar navbar-inverse">
  			<div class="container-fluid">
    			<!-- Brand and toggle get grouped for better mobile display -->
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        				<span class="sr-only">Toggle navigation</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
      				</button>
      				<a class="navbar-brand" href="index.php">Student Advising System</a>
    			</div>
    			<!-- Collect the nav links, forms, and other content for toggling -->
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    				<ul class="nav navbar-nav">
				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View <span class="caret"></span></a>
				          <ul class="dropdown-menu">
				            <li><a href="view/students.php">All Students</a></li>
				            <li><a href="#">All Curriculums</a></li>
				            <li><a href="#">All Subjects</a></li>
				            <li><a href="#">All Colleges</a></li>
				          </ul>
				        </li>
				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add <span class="caret"></span></a>
				          <ul class="dropdown-menu">
				            <li><a href="#">New Student</a></li>
				            <li><a href="#">New Curriculum</a></li>
				            <li><a href="#">New Subjects</a></li>
				          </ul>
				        </li>
				        <li><a href="#">Import</a></li>
				        <li><a href="#">Reports</a></li>
				      </ul>
      				<ul class="nav navbar-nav navbar-right">
        				<li class="dropdown">
          					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, Name of Adviser <span class="caret"></span></a>
          					<ul class="dropdown-menu">
            					<li><a href="#">Action</a></li>
            					<li><a href="#">Another action</a></li>
            					<li><a href="#">Something else here</a></li>
            					<li role="separator" class="divider"></li>
            					<li><a href="#">Logout</a></li>
          					</ul>
        				</li>
      				</ul>
    			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>
		<!--Navbar end-->

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
	</body>
</html>