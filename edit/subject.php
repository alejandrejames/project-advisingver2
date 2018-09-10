<?php
	$pagelvl = "2";
	include '../backend/connection.php';
	$subid = $_GET['subid'];

	$sql = "SELECT * FROM subject WHERE subject_id = '".$subid."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$subcode = $row['subject_name'];
	$subname = $row['subject_description'];
	$lecunits = $row['lecture_unit'];
	$labunits = $row['lab_unit'];
	$creditunits = $row['credit_unit'];
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
			  		<li><a href="../view/subjects.php">All Subjects</a></li>
			  		<li class="active"><?php echo $subcode.'-'.$subname;?></li>
				</ol>
				<div class="container-fluid">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
						    	<h3 class="panel-title">Edit Details</h3>
						  	</div>
							<div class="panel-body">
								<div id="notif-area"></div>
								<button class="btn btn-default" id="editsubdet">Edit</button>
								<div class="container-fluid">
									<input type=text id="editsubid" value="<?php echo $subid?>" hidden>
									<div class="col-md-6">
										<label for="editsubjectname">Subject Code</label>
										<input type="text" class="form-control" name="editsubjectname" id="editsubjectname" placeholder="Subject Code" value="<?php echo $subcode?>" disabled>
									</div>
									<div class="col-md-6">
										<label for="editsubjectdesc">Subject Description</label>
										<input type="text" class="form-control" name="editsubjectdesc" id="editsubjectdesc" placeholder="Subject Name" value="<?php echo $subname?>" disabled>
									</div>
									<div class="col-md-4">
										<label for="editlabunits">Lab Units</label>
										<input type="text" name="editlabunits" id="editlabunits" class="form-control" placeholder="Lab Units" value="<?php echo $labunits;?>" disabled>
									</div>
									<div class="col-md-4">
										<label for="editlectunits">Lecture Units</label>
										<input type="text" name="editlectunits" id="editlectunits" class="form-control" placeholder="Lecture Units" value="<?php echo $lecunits?>" disabled>
									</div>
									<div class="col-md-4">
										<label for="editcreditunits">Credit Units</label>
										<input type="text" name="editcreditunits" id="editcreditunits" class="form-control" placeholder="Credit Units" value="<?php echo $creditunits?>" disabled>
									</div>
									<div class="col-md-12">
										<button class="btn btn-success" id="updatesubdet" style="display: none;">Update</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
						    	<h3 class="panel-title">Pre-requisites</h3>
						  	</div>
							<div class="panel-body">
						    	<div class="container-fluid">
						    		<div class="table-responsive">
						    			<table class="table table-striped">
						    				<thead>
						    					<tr>
						    						<th>Subject Code</th>
						    						<th>Subject Title</th>
						    						<th>Lab Units</th>
						    						<th>Lecture Units</th>
						    						<th>Credit Units</th>
						    						<th>Remove</th>
						    					</tr>
						    				</thead>
						    				<tbody id="tbodyprereqlist">
						    					<?php
						    						$sql = "SELECT * FROM subject_preq,subject WHERE subject_preq.subject_id_preq = subject.subject_id AND subject_preq.subject_id = '".$subid."'";
						    						$result = $conn->query($sql);
						    						while($row = $result->fetch_assoc()){
						    							echo '
						    									<tr>
						    										<td>'.$row['subject_name'].'</td>
						    										<td>'.$row['subject_description'].'</td>
						    										<td>'.$row['lecture_unit'].'</td>
						    										<td>'.$row['lab_unit'].'</td>
						    										<td>'.$row['credit_unit'].'</td>
						    										<td><button type="text" class="btn btn-danger" onclick="removepreqsub('.$subid.','.$row['subject_id_preq'].')">Remove</button></td>
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
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
						    	<h3 class="panel-title">Add Pre-requisite</h3>
						  	</div>
							<div class="panel-body">
						    	<div class="container-fluid">
						    		<div class="table-responsive">
						    			<table class="table table-striped">
						    				<thead>
						    					<tr>
						    						<th>Subject Code</th>
						    						<th>Subject Title</th>
						    						<th>Lab Units</th>
						    						<th>Lecture Units</th>
						    						<th>Credit Units</th>
						    						<th>Add</th>
						    					</tr>
						    				</thead>
						    				<tbody id="tbodyaddprereq">
						    					<?php
						    						$sql = "SELECT * FROM subject WHERE subject_id != '".$subid."'";
						    						$result = $conn->query($sql);
						    						while($row = $result->fetch_assoc()){
						    							$sql2 = "SELECT * FROM subject_preq WHERE subject_id = '".$subid."' AND subject_id_preq = '".$row['subject_id']."'";
						    							$result2 = $conn->query($sql2);
						    							if($result2->fetch_assoc() != 0)
						    								{}
						    							else
						    								echo '
						    									<tr>
						    										<td>'.$row['subject_name'].'</td>
						    										<td>'.$row['subject_description'].'</td>
						    										<td>'.$row['lecture_unit'].'</td>
						    										<td>'.$row['lab_unit'].'</td>
						    										<td>'.$row['credit_unit'].'</td>
						    										<td><button type="text" class="btn btn-primary" onclick="addpreqsub('.$subid.','.$row['subject_id'].')">Add</button></td>
						    									</tr>
						    								';
						    						}
						    					?>
						    				</tbody>
						    			</table>
						    			<nav aria-label="...">
											<ul class="pagination">
										    	<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
										  	</ul>
										</nav>
						    		</div>
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
	<script type="text/javascript" src="../js/subjectfuncs.js"></script>
	</body>
</html>