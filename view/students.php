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
			  <li class="active">All Students</li>
			</ol>
			<div class="container-fluid">
				<input type="text" class="form-control" name="studentsearchbar" placeholder="Enter student name">
				<div class="col-md-6">
					<label for="filtercolleges">College</label>
					<select class="form-control" id="filtercolleges">
						<option value="0">All</option>
					</select>
				</div>
				<div class="col-md-6">
					<label for="filtercurriculum">Curriculum</label>
					<select class="form-control" id="filtercurriculum">
						<option value="0">All</option>
					</select>
				</div>
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Student No. </th>
									<th>Last Name</th>
									<th>First Name</th>
									<th>College</th>
									<th>Curriculum</th>
									<th>View Details</th>
									<th>Advise</th>
								</tr>
							</thead>
							<tbody id="tbodyallstud">
								<?php
									$sql = "SELECT * FROM student,college,curriculum WHERE student.college_id=college.college_id AND student.curriculum_id = curriculum.curriculum_id";
									$result = $conn->query($sql);
									while($row = $result->fetch_assoc()){
										echo '
											<tr>
												<td>'.$row['student_id'].'</td>
												<td>'.$row['student_lname'].'</td>
												<td>'.$row['student_fname'].'</td>
												<td>'.$row['college_name'].'</td>
												<td>'.$row['curriculum_name'].'</td>
												<td><a href="../edit/student.php?studid='.$row['student_id'].'"><button class="btn btn-success">Edit</button></a></td>
												<td><a href="../advising/advise.php?studid='.$row['student_id'].'"><button class="btn btn-primary">Advise</button></a></td>
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
		</div>
	<!--Scripts-->
	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/create2.js"></script>
	<script type="text/javascript" src="../js/userdeffunc2.js"></script>
	</body>
</html>