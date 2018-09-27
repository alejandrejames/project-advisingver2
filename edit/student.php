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
					<div class="col-md-4">
						<div id="notif-area"></div>
						<div class="panel panel-default">
							<div class="panel-heading">
						    	<h3 class="panel-title">Edit Student Details</h3>
						  	</div>
						  	<div class="panel-body">
						  		<div class="container-fluid">
						  			<input type="text" id="editstudid1" value="<?php echo $studid?>" hidden>
						    		<button class="btn btn-success" id="editstuddet">Edit</button>
					    			<div class="col-md-12">
					    				<img src="../data/img/default.png" alt="..." class="img-responsive" disabled>
					    			</div>
					    			<div class="col-md-12">
					    				<label for="editstudid">Student ID</label>
					    				<input type="text" class="form-control" id="editstudid" value="<?php echo $studid?>" disabled>
					    			</div>
					    			<div class="col-md-6">
					    				<label for="editstudlname">Last Name</label>
					    				<input type="text" class="form-control" id="editstudlname" placeholder="Last Name" value="<?php echo $studlname;?>" disabled>
					    			</div>
					    			<div class="col-md-6">
					    				<label for="editstudfname">First Name</label>
					    				<input type="text" class="form-control" id="editstudfname" placeholder="Last Name" value="<?php echo $studfname;?>" disabled>
					    			</div>
					    			<div class="col-md-12">
					    				<label for="editstudfname">Year Level</label>
					    				<select class="form-control" id="editstudyrlvl" disabled>
					    					<?php
					    						for($num=1;$num<5;$num++){
					    							if($num==$yrlvl)
					    								echo '<option value="'.$num.'" selected="selected">'.$num.'</option>';
					    							else
					    								echo '<option value="'.$num.'">'.$num.'</option>';
					    						}
					    					?>
					    				</select>
					    			</div>
					    			<div class="col-md-6">
					    				<label for="editstudCurriculum">Curriculum</label>
					    				<select class="form-control" id="editstudCurriculum" disabled>
					    					<?php
					    						$sql = "SELECT * FROM curriculum";
					    						$result = $conn->query($sql);
					    						while($row = $result->fetch_assoc()){
					    							if($row['curriculum_id']==$currid)
					    								echo '<option value="'.$row['curriculum_id'].'" selected="selected">'.$row['curriculum_name'].'</option>';
					    							else
					    								echo '<option value="'.$row['curriculum_id'].'">'.$row['curriculum_name'].'</option>';
					    						}
					    					?>
					    				</select>
					    			</div>
					    			<div class="col-md-6">
					    				<label for="editstudCollege">College</label>
					    				<select class="form-control" id="editstudCollege" disabled>
					    					<?php
					    						$sql = "SELECT * FROM college";
					    						$result = $conn->query($sql);
					    						while($row = $result->fetch_assoc()){
					    							if($row['college_id']==$collid)
					    								echo '<option value="'.$row['college_id'].'" selected="selected">'.$row['college_name'].'</option>';
					    							else
					    								echo '<option value="'.$row['college_id'].'">'.$row['college_name'].'</option>';
					    						}
					    					?>
					    				</select>
					    			</div>
					    			<div class="col-md-12">
					    				<button class="btn btn-success" id="updatestuddet" style="display: none;">Update</button>
					    			</div>
					    		</div>
						  	</div>
						</div>
					</div>
					<?php
						
					?>
					<div class="col-md-8">

						<ul class="nav nav-tabs">
						  <?php
						  		$sql = "SELECT DISTINCT student_schlyr_id FROM student_subject WHERE student_id = '".$studid."'";
						  		$result = $conn->query($sql);
						  		while($row = $result->fetch_assoc()){
						  			$sql2 = "SELECT * FROM student_schlyr WHERE student_schlyr_id = '".$row['student_schlyr_id']."'";
						  			$result2 = $conn->query($sql2);
						  			$num = 0;
						  			while($row2 = $result2->fetch_assoc()){
						  				if($num==0){
						  					echo '<input type="text" id="frstid" value="'.$row2['student_schlyr_id'].'" hidden>';
						  					echo '
						  					<li role="presentation" class="active"><a href="#schoolyr'.$row2['student_schlyr_id'].'" aria-controls="products" role="tab" data-toggle="tab">'.$row2['student_schlyr'].'</a></li>
						  					';
						  					$num++;
						  				}
						  				else
						  					echo '
						  					<li role="presentation"><a href="#schoolyr'.$row2['student_schlyr_id'].'" aria-controls="products" role="tab" data-toggle="tab">'.$row2['student_schlyr'].'</a></li>
						  					';						  				
						  			}
						  		}
						  ?>
						</ul>
						<div class="tab-content" id="studtabctn">
							<div role="tabpanel" class="tab-pane active" id="schoolyr1">
								<div class="form-group">
									<label for="selectgrades">Select Semester</label>
									<select class="form-control" name="selectgrades" id="selectgrades">
										<option value="1">1st Sem</option>
										<option value="2">2nd Sem</option>
										<option value="3">Summer</option>
									</select>
								</div>
								<div class="form-group">
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Subject Code</th>
													<th>Subject Description</th>
													<th>Subject Grade</th>
													<th>Update</th>
												</tr>
											</thead>
											<tbody id="studsublist">
												<?php

												?>
												<tr>
													<td>CS01</td>
													<td>ICT</td>
													<td><input type="number" class="form-control" name=""></td>
													<td><button class="btn btn-success">Update</button></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="schoolyr2">
							</div>
							<div role="tabpanel" class="tab-pane" id="schoolyr3">
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
	<script type="text/javascript" src="../js/studentfuncs.js"></script>
	</body>
</html>