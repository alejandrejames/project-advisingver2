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
			  <li class="active">Admin Page</li>
			</ol>
			<div class="container-fluid">
				<div class="col-md-12" id="notif-area"></div>
				<div class="container-fluid">
					<div class="col-md-4">
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title">Edit Details</h3>
						  </div>
						  <div class="panel-body">
						    	<div class="container-fluid">
						  			<input type="text" id="editaccid" value="<?php echo $_SESSION['accid']?>" hidden>
						    		<button class="btn btn-success" id="editaccdet">Edit</button>
					    			<div class="col-md-12">
					    				<label for="accunameinp">Account Username</label>
					    				<input type="text" class="form-control" id="accunameinp" value="<?php echo $accuname?>" disabled>
					    			</div>
					    			<div class="col-md-6">
					    				<label for="accfnameinp">First Name</label>
					    				<input type="text" class="form-control" id="accfnameinp" placeholder="First Name" value="<?php echo $accfname;?>" disabled>
					    			</div>
					    			<div class="col-md-6">
					    				<label for="acclnameinp">Last Name</label>
					    				<input type="text" class="form-control" id="acclnameinp" placeholder="Last Name" value="<?php echo $acclname;?>" disabled>
					    			</div>
					    		</div>
					    		<div class="col-md-12">
					    			<button class="btn btn-success" id="updateaccdet" style="display: none;">Update</button>
					    		</div>
						  	</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="panel panel-success">
						  <div class="panel-heading">
						    <h3 class="panel-title">Change Password</h3>
						  </div>
						  <div class="panel-body">
						    	<div class="container-fluid">
						    		<button class="btn btn-success" id="editaccpass">Edit</button>
					    			<div class="col-md-12">
					    				<label for="oldpassacc">Old Password</label>
					    				<input type="password" class="form-control" id="oldpassacc" placeholder="Old Password" disabled>
					    			</div>
					    			<div class="col-md-6">
					    				<label for="newpassacc">New Password</label>
					    				<input type="password" class="form-control" id="newpassacc" placeholder="New Password" disabled>
					    			</div>
					    			<div class="col-md-6">
					    				<label for="newpassaccconf">Confirm New Password</label>
					    				<input type="password" class="form-control" id="newpassaccconf" placeholder="Confirm New Password" disabled>
					    			</div>
					    		</div>
					    		<div class="col-md-12">
					    			<button class="btn btn-success" id="changepassacc" style="display: none;">Confirm</button>
					    		</div>
						  	</div>
						</div>
					</div>
					<div class="col-md-12"><h2>Advised Students</h2></div>
					<div class="col-md-12">
						<?php
							$sql = "SELECT DISTINCT student_schlyr_id FROM student_subject";
							$result = $conn->query($sql);
							while($row = $result->fetch_assoc()){
								$sql2 = "SELECT * FROM student_schlyr WHERE student_schlyr_id = '".$row['student_schlyr_id']."'";
								$result2 = $conn->query($sql2);
								while($row2 = $result2->fetch_assoc()){
									echo '
										<div class="col-md-4">
											<div class="panel panel-default">
									  			<div class="panel-heading">
									    			<h3 class="panel-title">'.$row2['student_schlyr'].'</h3>
									  			</div>
									  			<div class="panel-body">
											';
									$sql3 = "SELECT DISTINCT student_subject.student_id FROM student_subject,student WHERE student_subject.student_id = student.student_id AND student_schlyr_id = '".$row['student_schlyr_id']."' AND adviser_id = '".$_SESSION['accid']."'";
									$result3 = $conn->query($sql3);
									while($row3 = $result3->fetch_assoc()){
										$sql4 = "SELECT * FROM student WHERE student_id = '".$row3['student_id']."'";
										$result4 = $conn->query($sql4);
										while($row4 = $result4->fetch_assoc()){
											$sql5 = "SELECT DISTINCT semester FROM student_subject WHERE student_id = '".$row3['student_id']."'";
											$result5 = $conn->query($sql5);
											while($row5 = $result5->fetch_assoc()){
												echo '
													<div class="col-md-12">
														<button class="btn-group btn-group-justified btn btn-default" data-toggle="collapse" data-target="#studaccord-'.$row3['student_id'].'-'.$row5['semester'].'">'.$row3['student_id'].' - '.$row4['student_fname'].' '.$row4['student_lname'].' - Semester: '.$row5['semester'].'</button>
													</div><br><br>
													<div id="studaccord-'.$row3['student_id'].'-'.$row5['semester'].'" class="collapse">
														<table class="table table-striped">
															<thead>
																<tr>
																	<th>Subject Code</th>
																	<th>Subject Name</th>
																	<th>Grade</th>
																</tr>
															</thead>
															<tbody>
												';
												$sql6 = "SELECT * FROM student_subject,subject WHERE student_subject.subject_id = subject.subject_id AND student_id = '".$row3['student_id']."' AND student_schlyr_id = '".$row2['student_schlyr_id']."' AND semester = '".$row5['semester']."'";
												$result6 = $conn->query($sql6);
												while($row6 = $result6->fetch_assoc()){
													echo '
														<tr>
															<td>'.$row6['subject_name'].'</td>
															<td>'.$row6['subject_description'].'</td>
															<td>'.$row6['subject_grade'].'</td>
														</tr>
													';
												}
												echo '
															</tbody>
														</table>
													</div>
												';
											}
										}
									}
									echo '
												</div>
											</div>
										</div>
									';
								}
							}
						?>
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
	<script type="text/javascript" src="../js/adminfunc.js"></script>
	</body>
</html>