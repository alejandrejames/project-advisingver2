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
			  		<li><a href="../view/students.php">All Students</a></li>
			  		<li class="active"><?php echo $studlname.' '.$studfname;?></li>
				</ol>
				<div class="container-fluid">
					<div id="advdet" style="display: block;">
					<div class="col-md-12">
						<input type="text" name="studidins" id="studidins" value="<?php echo $studid?>" hidden>
						<input type="text" name="curridins" id="curridins" value="<?php echo $currid?>" hidden>
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
						    <button type="button" class="btn btn-success" id="advisebut1">Advise</button>
						  </div>
						</div>
					</div>
					</div>
					<div class="col-md-12" id="notif-area"></div>
					<div class="container-fluid" style="display: none;" id="advspnl">
						<div class="col-md-6">
							<div class="panel panel-default">
							  <div class="panel-heading">
							    <h3 class="panel-title">Advised Subjects</h3>
							  </div>
							  <div class="panel-body">
							    <table class="table table-striped">
							    	<thead>
							    		<th>Subject Code</th>
							    		<th>Subject Name</th>
							    		<th>Remove</th>	
							    	</thead>
							    	<tbody id="advstbl">
							    		
							    	</tbody>
							    </table>
								<button class="btn btn-primary" id="advbutfnl">Finalize</button>
							  </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-default">
							  <div class="panel-heading">
							    <h3 class="panel-title">Add subjects</h3>
							  </div>
							  <div class="panel-body">
							    <table class="table table-striped">
							    	<thead>
							    		<tr>
							    			<th>Add</th>
							    			<th>Subject Code</th>
							    			<th>Subject Name</th>
							    		</tr>	
							    	</thead>
							    	<tbody id="advsadd">
							    		<?php
							    			$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND curriculum_id = '".$currid."'";
							    			$result = $conn->query($sql);
							    			while($row = $result->fetch_assoc()){
							    				$sql2 = "SELECT * FROM student_subject WHERE subject_id = '".$row['subject_id']."'";
							    				$result2 = $conn->query($sql2);
							    				if($result2->fetch_assoc() == 0)
							    						echo '
							    							<tr>
							    								<td><button class="btn btn-success" onclick="advaddsub('.$row['subject_id'].')">Add</button></td>
							    								<td>'.$row['subject_name'].'</td>
							    								<td>'.$row['subject_description'].'</td>
							    							</tr>
							    							';
							    			}
							    		?>
							    	</tbody>
							    </table>
							  </div>
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
	<script type="text/javascript" src="../js/advisefunc.js"></script>
	</body>
</html>