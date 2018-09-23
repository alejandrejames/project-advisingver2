<?php
	$pagelvl = "2";
	include '../backend/connection.php';
	$studid = $_GET['studid'];

	$sql = "SELECT * FROM student WHERE student_id = '".$studid."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$studfname = $row['student_fname'];
	$studlname = $row['student_lname'];
	$yrlvl = $row['student_yrlvl'];
	$collid = $row['college_id'];
	$currid = $row['curriculum_id'];

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
			  		<li><a href="#">Advise</a></li>
			  		<li class="active"><?php echo $studlname.' '.$studfname;?></li>
				</ol>
				<div class="container-fluid">
					<div class="col-md-12">
						<select class="form-control" name="selectschlyr" id="selectschlyr">
							<?php
								$sql = "SELECT * FROM student_schlyr";
								$result = $conn->query($sql);
								while($row = $result->fetch_assoc()){
									echo '
										<option value="'.$row['student_schlyr_id'].'">S.Y. '.$row['student_schlyr'].'</option>
									';
								}
							?>
						</select>
					</div>
					<div class="col-md-6">
						<label for="selectyrlvl">Year Level</label>
						<select class="form-control" id="selectyrlvl" name="selectyrlvl">
							<option value="1">1st</option>
							<option value="2">2nd</option>
							<option value="3">3rd</option>
							<option value="4">4th</option>
						</select>
					</div>
					<div class="col-md-6">
						<label for="selectsem">Semester</label>
						<select class="form-control" id="selectsem" name="selectsem">
							<option value="1">1st</option>
							<option value="2">2nd</option>
							<option value="3">Summer</option>
						</select>
					</div>
					<div class="col-md-12">
						<div class="btn-group btn-group-justified" role="group" aria-label="...">
						  <div class="btn-group" role="group">
						    <button type="submit" class="btn btn-success" id="advisebut1">Confirm</button>
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
	</body>
</html>