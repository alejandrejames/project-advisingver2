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
			  <li class="active">All Curriculum</li>
			</ol>
			<div class="container-fluid">
				<input type="text" class="form-control" name="curriculumsearchbar" placeholder="Enter Curriculum name">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>  </th>
									<th>Curriculum</th>
									<th>College</th>
									<th>Edit Details</th>
								</tr>
							</thead>
							<tbody id="tbodyallsub">
								<?php
									$sql = "SELECT * FROM curriculum,college WHERE curriculum.college_id = college.college_id";
									$result = $conn->query($sql);
									$num = 0;
									while($row = $result->fetch_assoc()){
										$num++;
										echo '
											<tr>
												<td>'.$num.'</td>
												<td>'.$row['curriculum_name'].'</td>
												<td>'.$row['college_name'].'</td>
												<td><a href="../edit/curriculum.php?currid='.$row['curriculum_id'].'"><button class="btn btn-success">Edit</button></a></td>
											</tr>
										';
									}
								?>	
							</tbody>
						</table>
					</div>
				</div>
				<nav aria-label="...">
				  <ul class="pagination">
				    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
				  </ul>
				</nav>		
			</div>
	<!--Scripts-->
	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/create2.js"></script>
	<script type="text/javascript" src="../js/userdeffunc2.js"></script>
	<script type="text/javascript" src="../js/curriculumfuncs.js"></script>
	</body>
</html>