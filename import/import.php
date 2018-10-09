<?php
	include '../backend/connection.php';
	$pagelvl = "2";
	include '../globalincludes/loginauthen.php';
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
			  <li class="active">Import</li>
			</ol>
			<div class="container-fluid">
				<!--Dito nyo na lang ilagay yung code sa pag import-->
				<div class="col-md-12" id="notif-area"><?php if(isset($_SESSION['imprtnotif']))echo $_SESSION['imprtnotif']?></div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Import Subjects</h3>
						</div>
						<div class="panel-body">
							<form action="../backend/importcsvaddsub.php" method="POST" enctype="multipart/form-data">
							<div class="col-md-12">
								<label for="csvaddsub">CSV File</label>
								<input type="file" class="form-control" name="csvaddsub" id="csvaddsub" accept=".csv">
							</div><br>
							<div class="col-md-12">
								<label for="csvaddsubckbx">Import Subjects to curriculum</label>
								<input type="checkbox" name="csvaddsubckbx" id="csvaddsubckbx">
							</div><br>
							<div id="csvaddsubopt" style="display: none;">
								<div class="col-md-4">
									<label for="csvaddsubcurrid">Curriculum</label>
									<select class="form-control" id="csvaddsubcurrid" name="csvaddsubcurrid">
										<?php
											$sql = "SELECT * FROM curriculum";
											$result = $conn->query($sql);
											while($row = $result->fetch_assoc()){
												echo '
													<option value="'.$row['curriculum_id'].'">'.$row['curriculum_name'].'</option>
												';
											}
										?>
									</select>
								</div>
								<div class="col-md-4">
									<label for="csvaddsubyrlvl">Subject Year Level</label>
									<select class="form-control" id="csvaddsubyrlvl" id="name">
										<option value="1">1st</option>
										<option value="2">2nd</option>
										<option value="3">3rd</option>
										<option value="4">4th</option>
									</select>
								</div>
								<div class="col-md-4">
									<label for="csvaddsubsem">Subject Semesters</label>
									<select class="form-control" id="csvaddsubsem" name="csvaddsubsem">
										<option value="1">1st</option>
										<option value="2">2nd</option>
										<option value="3">Summer</option>
									</select>
								</div>
							</div>
							<button type="button" class="btn btn-success" id="butcsvaddsub">Import Subjects</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Import Students</h3>
						</div>
						<div class="panel-body">
							<div class="col-md-6">
								<label for="csvaddstudcolid">College</label>
								<select class="form-control" id="csvaddstudcolid">
									<?php
										$sql = "SELECT * FROM college";
										$result = $conn->query($sql);
										while ($row = $result->fetch_assoc()){
											echo '
												<option value="'.$row['college_id'].'">'.$row['college_name'].'</option>
											';
										}
									?>
								</select>
							</div>
							<div class="col-md-6">
								<label for="csvaddstudcurrid">Curriculum</label>
								<select class="form-control" id="csvaddstudcurrid">
									<?php
										$sql = "SELECT * FROM college";
										$result = $conn->query($sql);
										$row = $result->fetch_assoc();

										$sql2 = "SELECT * FROM curriculum WHERE college_id = '".$row['college_id']."'";
										$result2 = $conn->query($sql2);
										while($row = $result2->fetch_assoc()){
											echo '
												<option value="'.$row['curriculum_id'].'">'.$row['curriculum_name'].'</option>
											';
										}
									?>
								</select>
							</div>
							<div class="col-md-12">
								<label for="csvaddstud">CSV File</label>
								<input type="file" class="form-control" name="csvaddstud" id="csvaddstud" accept=".csv">
							</div><br><br>
							<button type="button" class="btn btn-success" id="butcsvaddstud">Import Student List</button>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Import Students</h3>
						</div>
						<div class="panel-body">
							<div class="col-md-6">
								<label for="csvupdtgrdcurrid">Curriculum</label>
								<select class="form-control" id="csvupdtgrdcurrid">
									<?php
										$sql = "SELECT * FROM curriculum";
										$result = $conn->query($sql);
										while($row = $result->fetch_assoc()){
											echo '
												<option value="'.$row['curriculum_id'].'">'.$row['curriculum_name'].'</option>
											';
										}
									?>
								</select>
							</div>
							<div class="col-md-6">
								<label for="csvupdtgrdsub">Subject</label>
								<select class="form-control" id="csvupdtgrdsub">
									<?php
										$sql = "SELECT * FROM curriculum";
										$result = $conn->query($sql);
										$row = $result->fetch_assoc();

										$sql2 = "SELECT * FROM subject_curriculum,subject WHERE subject.subject_id = subject_curriculum.subject_id AND curriculum_id = '".$row['curriculum_id']."'";
										$result2 = $conn->query($sql2);
										while($row = $result2->fetch_assoc()){
											echo '
												<option value="'.$row['subject_id'].'">'.$row['subject_name'].''.$row['subject_description'].'</option>
											';
										}
									?>
								</select>
							</div>
							<div class="col-md-6">
								<label for="csvupdtgrdschlyr">School Year</label>
								<select class="form-control" id="csvupdtgrdschlyr">
									<?php
										$sql = "SELECT * FROM student_schlyr";
										$result = $conn->query($sql);
										while($row = $result->fetch_assoc()){
											echo '
												<option value="'.$row['student_schlyr_id'].'">S.Y.'.$row['student_schlyr'].'</option>
											';
										}
									?>
								</select>
							</div>
							<div class="col-md-6">
								<label for="csvupdtgrdsem">Semester</label>
								<select class="form-control" id="csvupdtgrdsem">
									<option value="1">1st</option>
									<option value="2">2nd</option>
									<option value="3">Summer</option>
								</select>
							</div>
							<div class="col-md-12">
								<label for="csvupdtsub">CSV File</label>
								<input type="file" class="form-control" name="csvupdtsub" id="csvupdtsub" accept=".csv">
							</div><br><br>
							<button type="button" class="btn btn-success" id="butcsvupdtsub">Update Subject Grade</button>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Import Student Template</h3>
						</div>
						<div class="panel-body">
							<div class="container-fluid">
								<a href="../data/import/students.csv" download><button type="button" class="btn btn-success">Download .csv</button></a>
							</div>
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>student_id</th>
											<th>student_fname</th>
											<th>student_lname</th>
											<th>student_yrlvl</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>sample</td>
											<td>sample</td>
											<td>sample</td>
											<td>sample</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Import Subject Template</h3>
						</div>
						<div class="panel-body">
							<div class="container-fluid">
								<a href="../data/import/subject.csv" download><button type="button" class="btn btn-success">Download .csv</button></a>
							</div>
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>subject_code</th>
											<th>subject_name</th>
											<th>lab_units</th>
											<th>lec_units</th>
											<th>cred_units</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>sample</td>
											<td>sample</td>
											<td>sample</td>
											<td>sample</td>
											<td>sample</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Import Grades Template</h3>
						</div>
						<div class="panel-body">
							<div class="container-fluid">
								<a href="../data/import/updtgrade.csv" download><button type="button" class="btn btn-success">Download .csv</button></a>
							</div>
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>student_id</th>
											<th>student_grade</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>sample</td>
											<td>sample</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
	<!--Scripts-->
	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/create2.js"></script>
	<script type="text/javascript" src="../js/userdeffunc2.js"></script>
	<script type="text/javascript" src="../js/importfunc.js"></script>
	</body>
</html>