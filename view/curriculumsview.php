<?php
	include '../backend/connection.php';
	$pagelvl = "2";
	include '../globalincludes/loginauthen.php';
	$currid = $_GET['currid'];
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
				<a href="../edit/curriculum.php?currid=<?php echo $currid;?>"><button class="btn btn-success">Edit curriculum</button></a>
			</div><br>
			<div class="container-fluid">
				<div class="panel panel-primary">
				  	<div class="panel-heading">1st Year</div>
				  	<div class="panel-body">
				  		<div class="col-md-6">
				  			<div class="panel panel-success">
						  		<div class="panel-heading">1st Sem</div>
						  		<div class="panel-body">
						    		<div class="table-responsive">
						    			<table class="table table-striped table-hover">
						    				<thead>
						    					<tr>
						    						<th>Subject Code</th>
						    						<th>Subject Name</th>
						    						<th>Total Units</th>
						    						<th>Lecture Units</th>
						    						<th>Lab Units</th>
						    						<th>Subject Prequisites</th>
						    					</tr>
						    				</thead>
						    				<tbody>
						    					<?php
						    						$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND subject_yrlvl = '1' AND subject_semester = '1' AND curriculum_id = '".$currid."'";
						    						$result = $conn->query($sql);
						    						while ($row = $result->fetch_assoc()){
						    							echo '
						    								<tr>
						    									<td>'.$row['subject_name'].'</td>
						    									<td>'.$row['subject_description'].'</td>
						    									<td>'.$row['credit_unit'].'</td>
						    									<td>'.$row['lecture_unit'].'</td>
						    									<td>'.$row['lab_unit'].'</td>
						    							';
						    							$sql2 = "SELECT * FROM subject,subject_preq WHERE subject.subject_id=subject_preq.subject_id AND subject_preq.subject_id = '".$row['subject_id']."'";
						    							$result2 = $conn->query($sql2);
						    							$cnt = $result2->num_rows;
						    							if($cnt > 0){
						    								echo '<td>';
						    								while($row2 = $result2->fetch_assoc()){
						    									echo $row2['subject_name'].',';
						    								}
						    								echo '</td>';
						    								echo '</tr>';
						    							}
						    							else
						    								echo '<td>NONE</td>';
						    						}
						    					?>
						    				</tbody>
						    			</table>
						    		</div>
						  		</div>
							</div>
				  		</div>

						<div class="col-md-6">
				  			<div class="panel panel-success">
						  		<div class="panel-heading">2nd Sem</div>
						  		<div class="panel-body">
						    		<div class="table-responsive">
						    			<table class="table table-striped table-hover">
						    				<thead>
						    					<tr>
						    						<th>Subject Code</th>
						    						<th>Subject Name</th>
						    						<th>Total Units</th>
						    						<th>Lecture Units</th>
						    						<th>Lab Units</th>
						    						<th>Subject Prequisites</th>
						    					</tr>
						    				</thead>
						    				<tbody>
						    					<?php
						    						$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND subject_yrlvl = '1' AND subject_semester = '2' AND curriculum_id = '".$currid."'";
						    						$result = $conn->query($sql);
						    						while ($row = $result->fetch_assoc()){
						    							echo '
						    								<tr>
						    									<td>'.$row['subject_name'].'</td>
						    									<td>'.$row['subject_description'].'</td>
						    									<td>'.$row['credit_unit'].'</td>
						    									<td>'.$row['lecture_unit'].'</td>
						    									<td>'.$row['lab_unit'].'</td>
						    							';
						    							$sql2 = "SELECT * FROM subject,subject_preq WHERE subject.subject_id=subject_preq.subject_id AND subject_preq.subject_id = '".$row['subject_id']."'";
						    							$result2 = $conn->query($sql2);
						    							$cnt = $result2->num_rows;
						    							if($cnt > 0){
						    								echo '<td>';
						    								while($row2 = $result2->fetch_assoc()){
						    									echo $row2['subject_name'].',';
						    								}
						    								echo '</td>';
						    								echo '</tr>';
						    							}
						    							else
						    								echo '<td>NONE</td>';
						    						}
						    					?>
						    				</tbody>
						    			</table>
						    		</div>
						  		</div>
							</div>
				  		</div>

				  		<?php
				  			$sql = "SELECT * FROM subject_curriculum WHERE subject_semester = '3'";
				  			$result = $conn->query($sql);
				  			$cnt = $result->num_rows;
				  			if($cnt > 0){
				  				echo '
				  					<div class="col-md-6">
				  						<div class="panel panel-success">
						  					<div class="panel-heading">Summer</div>
						  					<div class="panel-body">
						    					<div class="table-responsive">
						    						<table class="table table-striped table-hover">
						    							<thead>
						    								<tr>
						    									<th>Subject Code</th>
						    									<th>Subject Name</th>
						    									<th>Total Units</th>
						    									<th>Lecture Units</th>
						    									<th>Lab Units</th>
						    									<th>Subject Prequisites</th>
						    								</tr>
						    							</thead>
						    							<tbody>';
						    							$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND subject_yrlvl = '1' AND subject_semester = '3' AND curriculum_id = '".$currid."'";
						    							$result = $conn->query($sql);
						    							while ($row = $result->fetch_assoc()){
						    								echo '
						    									<tr>
						    										<td>'.$row['subject_name'].'</td>
						    										<td>'.$row['subject_description'].'</td>
						    										<td>'.$row['credit_unit'].'</td>
						    										<td>'.$row['lecture_unit'].'</td>
						    										<td>'.$row['lab_unit'].'</td>
						    								';
						    								$sql2 = "SELECT * FROM subject,subject_preq WHERE subject.subject_id=subject_preq.subject_id AND subject_preq.subject_id = '".$row['subject_id']."'";
						    								$result2 = $conn->query($sql2);
						    								$cnt = $result2->num_rows;
						    								if($cnt > 0){
						    									echo '<td>';
						    									while($row2 = $result2->fetch_assoc()){
						    										echo $row2['subject_name'].',';
						    									}
						    									echo '</td>';
						    									echo '</tr>';
						    								}
						    								else
						    									echo '<td>NONE</td>';
						    							}
						    					
						    					echo '
						    						</tbody>
						    					</table>
						    				</div>
						  				</div>
									</div>
				  				</div>
				  				';
				  			}
				  		?>
				  	</div>
				</div>

				<div class="panel panel-primary">
				  	<div class="panel-heading">2nd Year</div>
				  	<div class="panel-body">
				  		<div class="col-md-6">
				  			<div class="panel panel-success">
						  		<div class="panel-heading">1st Sem</div>
						  		<div class="panel-body">
						    		<div class="table-responsive">
						    			<table class="table table-striped table-hover">
						    				<thead>
						    					<tr>
						    						<th>Subject Code</th>
						    						<th>Subject Name</th>
						    						<th>Total Units</th>
						    						<th>Lecture Units</th>
						    						<th>Lab Units</th>
						    						<th>Subject Prequisites</th>
						    					</tr>
						    				</thead>
						    				<tbody>
						    					<?php
						    						$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND subject_yrlvl = '2' AND subject_semester = '1' AND curriculum_id = '".$currid."'";
						    						$result = $conn->query($sql);
						    						while ($row = $result->fetch_assoc()){
						    							echo '
						    								<tr>
						    									<td>'.$row['subject_name'].'</td>
						    									<td>'.$row['subject_description'].'</td>
						    									<td>'.$row['credit_unit'].'</td>
						    									<td>'.$row['lecture_unit'].'</td>
						    									<td>'.$row['lab_unit'].'</td>
						    							';
						    							$sql2 = "SELECT * FROM subject,subject_preq WHERE subject.subject_id=subject_preq.subject_id AND subject_preq.subject_id = '".$row['subject_id']."'";
						    							$result2 = $conn->query($sql2);
						    							$cnt = $result2->num_rows;
						    							if($cnt > 0){
						    								echo '<td>';
						    								while($row2 = $result2->fetch_assoc()){
						    									echo $row2['subject_name'].',';
						    								}
						    								echo '</td>';
						    								echo '</tr>';
						    							}
						    							else
						    								echo '<td>NONE</td>';
						    						}
						    					?>
						    				</tbody>
						    			</table>
						    		</div>
						  		</div>
							</div>
				  		</div>

						<div class="col-md-6">
				  			<div class="panel panel-success">
						  		<div class="panel-heading">2nd Sem</div>
						  		<div class="panel-body">
						    		<div class="table-responsive">
						    			<table class="table table-striped table-hover">
						    				<thead>
						    					<tr>
						    						<th>Subject Code</th>
						    						<th>Subject Name</th>
						    						<th>Total Units</th>
						    						<th>Lecture Units</th>
						    						<th>Lab Units</th>
						    						<th>Subject Prequisites</th>
						    					</tr>
						    				</thead>
						    				<tbody>
						    					<?php
						    						$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND subject_yrlvl = '2' AND subject_semester = '2' AND curriculum_id = '".$currid."'";
						    						$result = $conn->query($sql);
						    						while ($row = $result->fetch_assoc()){
						    							echo '
						    								<tr>
						    									<td>'.$row['subject_name'].'</td>
						    									<td>'.$row['subject_description'].'</td>
						    									<td>'.$row['credit_unit'].'</td>
						    									<td>'.$row['lecture_unit'].'</td>
						    									<td>'.$row['lab_unit'].'</td>
						    							';
						    							$sql2 = "SELECT * FROM subject,subject_preq WHERE subject.subject_id=subject_preq.subject_id AND subject_preq.subject_id = '".$row['subject_id']."'";
						    							$result2 = $conn->query($sql2);
						    							$cnt = $result2->num_rows;
						    							if($cnt > 0){
						    								echo '<td>';
						    								while($row2 = $result2->fetch_assoc()){
						    									echo $row2['subject_name'].',';
						    								}
						    								echo '</td>';
						    								echo '</tr>';
						    							}
						    							else
						    								echo '<td>NONE</td>';
						    						}
						    					?>
						    				</tbody>
						    			</table>
						    		</div>
						  		</div>
							</div>
				  		</div>

				  		<?php
				  			$sql = "SELECT * FROM subject_curriculum WHERE subject_semester = '3'";
				  			$result = $conn->query($sql);
				  			$cnt = $result->num_rows;
				  			if($cnt > 0){
				  				echo '
				  					<div class="col-md-6">
				  						<div class="panel panel-success">
						  					<div class="panel-heading">Summer</div>
						  					<div class="panel-body">
						    					<div class="table-responsive">
						    						<table class="table table-striped table-hover">
						    							<thead>
						    								<tr>
						    									<th>Subject Code</th>
						    									<th>Subject Name</th>
						    									<th>Total Units</th>
						    									<th>Lecture Units</th>
						    									<th>Lab Units</th>
						    									<th>Subject Prequisites</th>
						    								</tr>
						    							</thead>
						    							<tbody>';
						    							$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND subject_yrlvl = '2' AND subject_semester = '3' AND curriculum_id = '".$currid."'";
						    							$result = $conn->query($sql);
						    							while ($row = $result->fetch_assoc()){
						    								echo '
						    									<tr>
						    										<td>'.$row['subject_name'].'</td>
						    										<td>'.$row['subject_description'].'</td>
						    										<td>'.$row['credit_unit'].'</td>
						    										<td>'.$row['lecture_unit'].'</td>
						    										<td>'.$row['lab_unit'].'</td>
						    								';
						    								$sql2 = "SELECT * FROM subject,subject_preq WHERE subject.subject_id=subject_preq.subject_id AND subject_preq.subject_id = '".$row['subject_id']."'";
						    								$result2 = $conn->query($sql2);
						    								$cnt = $result2->num_rows;
						    								if($cnt > 0){
						    									echo '<td>';
						    									while($row2 = $result2->fetch_assoc()){
						    										echo $row2['subject_name'].',';
						    									}
						    									echo '</td>';
						    									echo '</tr>';
						    								}
						    								else
						    									echo '<td>NONE</td>';
						    							}
						    					
						    					echo '
						    						</tbody>
						    					</table>
						    				</div>
						  				</div>
									</div>
				  				</div>
				  				';
				  			}
				  		?>
				  	</div>
				</div>

				<div class="panel panel-primary">
				  	<div class="panel-heading">3rd Year</div>
				  	<div class="panel-body">
				  		<div class="col-md-6">
				  			<div class="panel panel-success">
						  		<div class="panel-heading">1st Sem</div>
						  		<div class="panel-body">
						    		<div class="table-responsive">
						    			<table class="table table-striped table-hover">
						    				<thead>
						    					<tr>
						    						<th>Subject Code</th>
						    						<th>Subject Name</th>
						    						<th>Total Units</th>
						    						<th>Lecture Units</th>
						    						<th>Lab Units</th>
						    						<th>Subject Prequisites</th>
						    					</tr>
						    				</thead>
						    				<tbody>
						    					<?php
						    						$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND subject_yrlvl = '3' AND subject_semester = '1' AND curriculum_id = '".$currid."'";
						    						$result = $conn->query($sql);
						    						while ($row = $result->fetch_assoc()){
						    							echo '
						    								<tr>
						    									<td>'.$row['subject_name'].'</td>
						    									<td>'.$row['subject_description'].'</td>
						    									<td>'.$row['credit_unit'].'</td>
						    									<td>'.$row['lecture_unit'].'</td>
						    									<td>'.$row['lab_unit'].'</td>
						    							';
						    							$sql2 = "SELECT * FROM subject,subject_preq WHERE subject.subject_id=subject_preq.subject_id AND subject_preq.subject_id = '".$row['subject_id']."'";
						    							$result2 = $conn->query($sql2);
						    							$cnt = $result2->num_rows;
						    							if($cnt > 0){
						    								echo '<td>';
						    								while($row2 = $result2->fetch_assoc()){
						    									echo $row2['subject_name'].',';
						    								}
						    								echo '</td>';
						    								echo '</tr>';
						    							}
						    							else
						    								echo '<td>NONE</td>';
						    						}
						    					?>
						    				</tbody>
						    			</table>
						    		</div>
						  		</div>
							</div>
				  		</div>

						<div class="col-md-6">
				  			<div class="panel panel-success">
						  		<div class="panel-heading">2nd Sem</div>
						  		<div class="panel-body">
						    		<div class="table-responsive">
						    			<table class="table table-striped table-hover">
						    				<thead>
						    					<tr>
						    						<th>Subject Code</th>
						    						<th>Subject Name</th>
						    						<th>Total Units</th>
						    						<th>Lecture Units</th>
						    						<th>Lab Units</th>
						    						<th>Subject Prequisites</th>
						    					</tr>
						    				</thead>
						    				<tbody>
						    					<?php
						    						$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND subject_yrlvl = '3' AND subject_semester = '2' AND curriculum_id = '".$currid."'";
						    						$result = $conn->query($sql);
						    						while ($row = $result->fetch_assoc()){
						    							echo '
						    								<tr>
						    									<td>'.$row['subject_name'].'</td>
						    									<td>'.$row['subject_description'].'</td>
						    									<td>'.$row['credit_unit'].'</td>
						    									<td>'.$row['lecture_unit'].'</td>
						    									<td>'.$row['lab_unit'].'</td>
						    							';
						    							$sql2 = "SELECT * FROM subject,subject_preq WHERE subject.subject_id=subject_preq.subject_id AND subject_preq.subject_id = '".$row['subject_id']."'";
						    							$result2 = $conn->query($sql2);
						    							$cnt = $result2->num_rows;
						    							if($cnt > 0){
						    								echo '<td>';
						    								while($row2 = $result2->fetch_assoc()){
						    									echo $row2['subject_name'].',';
						    								}
						    								echo '</td>';
						    								echo '</tr>';
						    							}
						    							else
						    								echo '<td>NONE</td>';
						    						}
						    					?>
						    				</tbody>
						    			</table>
						    		</div>
						  		</div>
							</div>
				  		</div>

				  		<?php
				  			$sql = "SELECT * FROM subject_curriculum WHERE subject_semester = '3'";
				  			$result = $conn->query($sql);
				  			$cnt = $result->num_rows;
				  			if($cnt > 0){
				  				echo '
				  					<div class="col-md-6">
				  						<div class="panel panel-success">
						  					<div class="panel-heading">Summer</div>
						  					<div class="panel-body">
						    					<div class="table-responsive">
						    						<table class="table table-striped table-hover">
						    							<thead>
						    								<tr>
						    									<th>Subject Code</th>
						    									<th>Subject Name</th>
						    									<th>Total Units</th>
						    									<th>Lecture Units</th>
						    									<th>Lab Units</th>
						    									<th>Subject Prequisites</th>
						    								</tr>
						    							</thead>
						    							<tbody>';
						    							$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND subject_yrlvl = '3' AND subject_semester = '3' AND curriculum_id = '".$currid."'";
						    							$result = $conn->query($sql);
						    							while ($row = $result->fetch_assoc()){
						    								echo '
						    									<tr>
						    										<td>'.$row['subject_name'].'</td>
						    										<td>'.$row['subject_description'].'</td>
						    										<td>'.$row['credit_unit'].'</td>
						    										<td>'.$row['lecture_unit'].'</td>
						    										<td>'.$row['lab_unit'].'</td>
						    								';
						    								$sql2 = "SELECT * FROM subject,subject_preq WHERE subject.subject_id=subject_preq.subject_id AND subject_preq.subject_id = '".$row['subject_id']."'";
						    								$result2 = $conn->query($sql2);
						    								$cnt = $result2->num_rows;
						    								if($cnt > 0){
						    									echo '<td>';
						    									while($row2 = $result2->fetch_assoc()){
						    										echo $row2['subject_name'].',';
						    									}
						    									echo '</td>';
						    									echo '</tr>';
						    								}
						    								else
						    									echo '<td>NONE</td>';
						    							}
						    					
						    					echo '
						    						</tbody>
						    					</table>
						    				</div>
						  				</div>
									</div>
				  				</div>
				  				';
				  			}
				  		?>
				  	</div>
				</div>

				<div class="panel panel-primary">
				  	<div class="panel-heading">4th Year</div>
				  	<div class="panel-body">
				  		<div class="col-md-6">
				  			<div class="panel panel-success">
						  		<div class="panel-heading">1st Sem</div>
						  		<div class="panel-body">
						    		<div class="table-responsive">
						    			<table class="table table-striped table-hover">
						    				<thead>
						    					<tr>
						    						<th>Subject Code</th>
						    						<th>Subject Name</th>
						    						<th>Total Units</th>
						    						<th>Lecture Units</th>
						    						<th>Lab Units</th>
						    						<th>Subject Prequisites</th>
						    					</tr>
						    				</thead>
						    				<tbody>
						    					<?php
						    						$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND subject_yrlvl = '4' AND subject_semester = '1' AND curriculum_id = '".$currid."'";
						    						$result = $conn->query($sql);
						    						while ($row = $result->fetch_assoc()){
						    							echo '
						    								<tr>
						    									<td>'.$row['subject_name'].'</td>
						    									<td>'.$row['subject_description'].'</td>
						    									<td>'.$row['credit_unit'].'</td>
						    									<td>'.$row['lecture_unit'].'</td>
						    									<td>'.$row['lab_unit'].'</td>
						    							';
						    							$sql2 = "SELECT * FROM subject,subject_preq WHERE subject.subject_id=subject_preq.subject_id AND subject_preq.subject_id = '".$row['subject_id']."'";
						    							$result2 = $conn->query($sql2);
						    							$cnt = $result2->num_rows;
						    							if($cnt > 0){
						    								echo '<td>';
						    								while($row2 = $result2->fetch_assoc()){
						    									echo $row2['subject_name'].',';
						    								}
						    								echo '</td>';
						    								echo '</tr>';
						    							}
						    							else
						    								echo '<td>NONE</td>';
						    						}
						    					?>
						    				</tbody>
						    			</table>
						    		</div>
						  		</div>
							</div>
				  		</div>

						<div class="col-md-6">
				  			<div class="panel panel-success">
						  		<div class="panel-heading">2nd Sem</div>
						  		<div class="panel-body">
						    		<div class="table-responsive">
						    			<table class="table table-striped table-hover">
						    				<thead>
						    					<tr>
						    						<th>Subject Code</th>
						    						<th>Subject Name</th>
						    						<th>Total Units</th>
						    						<th>Lecture Units</th>
						    						<th>Lab Units</th>
						    						<th>Subject Prequisites</th>
						    					</tr>
						    				</thead>
						    				<tbody>
						    					<?php
						    						$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND subject_yrlvl = '4' AND subject_semester = '2' AND curriculum_id = '".$currid."'";
						    						$result = $conn->query($sql);
						    						while ($row = $result->fetch_assoc()){
						    							echo '
						    								<tr>
						    									<td>'.$row['subject_name'].'</td>
						    									<td>'.$row['subject_description'].'</td>
						    									<td>'.$row['credit_unit'].'</td>
						    									<td>'.$row['lecture_unit'].'</td>
						    									<td>'.$row['lab_unit'].'</td>
						    							';
						    							$sql2 = "SELECT * FROM subject,subject_preq WHERE subject.subject_id=subject_preq.subject_id AND subject_preq.subject_id = '".$row['subject_id']."'";
						    							$result2 = $conn->query($sql2);
						    							$cnt = $result2->num_rows;
						    							if($cnt > 0){
						    								echo '<td>';
						    								while($row2 = $result2->fetch_assoc()){
						    									echo $row2['subject_name'].',';
						    								}
						    								echo '</td>';
						    								echo '</tr>';
						    							}
						    							else
						    								echo '<td>NONE</td>';
						    						}
						    					?>
						    				</tbody>
						    			</table>
						    		</div>
						  		</div>
							</div>
				  		</div>

				  		<?php
				  			$sql = "SELECT * FROM subject_curriculum WHERE subject_semester = '3'";
				  			$result = $conn->query($sql);
				  			$cnt = $result->num_rows;
				  			if($cnt > 0){
				  				echo '
				  					<div class="col-md-6">
				  						<div class="panel panel-success">
						  					<div class="panel-heading">Summer</div>
						  					<div class="panel-body">
						    					<div class="table-responsive">
						    						<table class="table table-striped table-hover">
						    							<thead>
						    								<tr>
						    									<th>Subject Code</th>
						    									<th>Subject Name</th>
						    									<th>Total Units</th>
						    									<th>Lecture Units</th>
						    									<th>Lab Units</th>
						    									<th>Subject Prequisites</th>
						    								</tr>
						    							</thead>
						    							<tbody>';
						    							$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND subject_yrlvl = '4' AND subject_semester = '3' AND curriculum_id = '".$currid."'";
						    							$result = $conn->query($sql);
						    							while ($row = $result->fetch_assoc()){
						    								echo '
						    									<tr>
						    										<td>'.$row['subject_name'].'</td>
						    										<td>'.$row['subject_description'].'</td>
						    										<td>'.$row['credit_unit'].'</td>
						    										<td>'.$row['lecture_unit'].'</td>
						    										<td>'.$row['lab_unit'].'</td>
						    								';
						    								$sql2 = "SELECT * FROM subject,subject_preq WHERE subject.subject_id=subject_preq.subject_id AND subject_preq.subject_id = '".$row['subject_id']."'";
						    								$result2 = $conn->query($sql2);
						    								$cnt = $result2->num_rows;
						    								if($cnt > 0){
						    									echo '<td>';
						    									while($row2 = $result2->fetch_assoc()){
						    										echo $row2['subject_name'].',';
						    									}
						    									echo '</td>';
						    									echo '</tr>';
						    								}
						    								else
						    									echo '<td>NONE</td>';
						    							}
						    					
						    					echo '
						    						</tbody>
						    					</table>
						    				</div>
						  				</div>
									</div>
				  				</div>
				  				';
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
	<script type="text/javascript" src="../js/curriculumfuncs.js"></script>
	<script type="text/javascript" src="../js/pagination.js"></script>
	<script type="text/javascript" src="../js/search.js"></script>
	</body>
</html>