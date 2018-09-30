<?php
	include 'backend/connection.php';
	$pagelvl = '1';
	include 'globalincludes/loginauthen.php';
?><!DOCTYPE html>
<html>
	<head>
		<title>Student Advising System Ver: 2.0</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		
	</head>
	<body>
		<!--Header-->
		<?php include 'globalincludes/header.php';?>
		<!--Header-->

		<div class="container-fluid">
			<ol class="breadcrumb">
			  <li class="active"><a href="">Home</a></li>
			</ol>
			<!--<div class="form-group">
          		<input type="text" class="form-control" placeholder="Search" >
        	</div>
        	<div class="btn-group btn-group-justified" role="group" aria-label="...">
			  <div class="btn-group" role="group">
			    <button type="submit" class="btn btn-default">Submit</button>
			  </div>
			</div>-->
			<div class="col-md-12"><BR></div>
			<div class="container-fluid srch-rslt">
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
					    	<a href="view/students.php" name="View all students"><h3 class="panel-title">Students Per College</h3></a>
					  	</div>
					  	<div class="panel-body">
					    	<canvas id="studentchart" height="200"></canvas>
					  	</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
					    	<a href="view/curriculums.php" name="View all curriculums"><h3 class="panel-title">Subjects Per Curriculum</h3></a>
					  	</div>
					  	<div class="panel-body">
					    	<canvas id="subjectchart" height="200"></canvas>
					  	</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
					    	<a href="view/subjects.php" name="View all subjects"><h3 class="panel-title">Subjects Taken Per School Year</h3></a>
					  	</div>
					  	<div class="panel-body">
					    	<canvas id="schlyrchart" height="200"></canvas>
					  	</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
					    	<h3 class="panel-title">Recent Students</h3>
					  	</div>
					  	<div class="panel-body">
					 		<div class="list-group">
					 			<?php
					 				$sql = "SELECT * FROM student LIMIT 0,5";
					 				$result = $conn->query($sql);
					 				while($row = $result->fetch_assoc()){
					 					echo '
					 						<a href="edit/student.php?studid='.$row['student_id'].'" class="list-group-item">'.$row['student_fname'].' '.$row['student_lname'].'</a>
					 					';
					 				}
					 			?>
							</div>
					  	</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
					    	<h3 class="panel-title">Recent Curriculums</h3>
					  	</div>
					  	<div class="panel-body">
					 		<div class="list-group">
					 			<?php
					 				$sql = "SELECT * FROM curriculum LIMIT 0,5";
					 				$result = $conn->query($sql);
					 				while($row = $result->fetch_assoc()){
					 					echo '
					 						<a href="edit/curriculum.php?currid='.$row['curriculum_id'].'" class="list-group-item">'.$row['curriculum_name'].'</a>
					 					';
					 				}
					 			?>
							</div>
					  	</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
					    	<h3 class="panel-title">Recent Subjects</h3>
					  	</div>
					  	<div class="panel-body">
					 		<div class="list-group">
					 			<?php
					 				$sql = "SELECT * FROM subject LIMIT 0,5";
					 				$result = $conn->query($sql);
					 				while($row = $result->fetch_assoc()){
					 					echo '
					 						<a href="edit/subject.php?subid='.$row['subject_id'].'" class="list-group-item">'.$row['subject_name'].' - '.$row['subject_description'].'</a>
					 					';
					 				}
					 			?>
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
	<script type="text/javascript" src="js/create.js"></script>
	<script type="text/javascript" src="js/userdeffunc.js"></script>
	<script type="text/javascript" src="js/Chart.bundle.js"></script>

	<script>
		var ctx = document.getElementById("studentchart").getContext('2d');
		var myChart = new Chart(ctx, {
    		type: 'doughnut',
    		data: {
        		labels: [<?php 
        					$sql = "SELECT * FROM college";
							$result = $conn->query($sql);
							$num = 0;
							while($row = $result->fetch_assoc()){
								if($num==0){
									echo '"'.$row['college_name'].'"';
									$num++;
								}
								else
									echo ','.'"'.$row['college_name'].'"';
						}?>],
        		datasets: [{
            		label: '# of students',
            		data: [<?php
            					$sql = "SELECT * FROM college";
            					$result = $conn->query($sql);
            					$num = 0;
            					while($row = $result->fetch_assoc()){
            						$sql2 = "SELECT COUNT(*) as TOTAL FROM student WHERE college_id = '".$row['college_id']."'";
            						$result2 = $conn->query($sql2);
            						$row2 = $result2->fetch_assoc();
            						if($num==0){
										echo '"'.$row2['TOTAL'].'"';
										$num++;
									}
									else
										echo ','.'"'.$row2['TOTAL'].'"';
            					}
            			?>],
            		backgroundColor: [
                		'rgba(255, 99, 132, 0.2)',
                		'rgba(54, 162, 235, 0.2)',
                		'rgba(255, 206, 86, 0.2)',
                		'rgba(75, 192, 192, 0.2)',
                		'rgba(153, 102, 255, 0.2)',
                		'rgba(255, 159, 64, 0.2)'
            		],
            		borderColor: [
                		'rgba(255,99,132,1)',
                		'rgba(54, 162, 235, 1)',
                		'rgba(255, 206, 86, 1)',
                		'rgba(75, 192, 192, 1)',
                		'rgba(153, 102, 255, 1)',
                		'rgba(255, 159, 64, 1)'
            		],
            		borderWidth: 1
        		}]
    		}
		});

		var ctx2 = document.getElementById("subjectchart").getContext('2d');
		var myChart2 = new Chart(ctx2, {
    		type: 'pie',
    		data: {
        		labels: [<?php 
        					$sql = "SELECT * FROM curriculum";
							$result = $conn->query($sql);
							$num = 0;
							while($row = $result->fetch_assoc()){
								if($num==0){
									echo '"'.$row['curriculum_name'].'"';
									$num++;
								}
								else
									echo ','.'"'.$row['curriculum_name'].'"';
						}?>],
        		datasets: [{
            		label: '# of subjects',
            		data: [<?php
            					$sql = "SELECT * FROM student_schlyr";
            					$result = $conn->query($sql);
            					$num = 0;
            					while($row = $result->fetch_assoc()){
            						$sql2 = "SELECT COUNT(*) as TOTAL FROM student_subject WHERE student_schlyr_id = '".$row['student_schlyr_id']."'";
            						$result2 = $conn->query($sql2);
            						$row2 = $result2->fetch_assoc();
            						if($num==0){
										echo '"'.$row2['TOTAL'].'"';
										$num++;
									}
									else
										echo ','.'"'.$row2['TOTAL'].'"';
            					}
            			?>],
            		backgroundColor: [
                		'rgba(255, 99, 132, 0.2)',
                		'rgba(54, 162, 235, 0.2)',
                		'rgba(255, 206, 86, 0.2)',
                		'rgba(75, 192, 192, 0.2)',
                		'rgba(153, 102, 255, 0.2)',
                		'rgba(255, 159, 64, 0.2)'
            		],
            		borderColor: [
                		'rgba(255,99,132,1)',
                		'rgba(54, 162, 235, 1)',
                		'rgba(255, 206, 86, 1)',
                		'rgba(75, 192, 192, 1)',
                		'rgba(153, 102, 255, 1)',
                		'rgba(255, 159, 64, 1)'
            		],
            		borderWidth: 1
        		}]
    		}
		});

		var ctx3 = document.getElementById("schlyrchart").getContext('2d');
		var myChart3 = new Chart(ctx3, {
    		type: 'bar',
    		data: {
        		labels: [<?php 
        					$sql = "SELECT * FROM student_schlyr";
							$result = $conn->query($sql);
							$num = 0;
							while($row = $result->fetch_assoc()){
								if($num==0){
									echo '"'.$row['student_schlyr'].'"';
									$num++;
								}
								else
									echo ','.'"'.$row['student_schlyr'].'"';
						}?>],
        		datasets: [{
            		label: '# of subjects',
            		data: [<?php
            					$sql = "SELECT * FROM curriculum";
            					$result = $conn->query($sql);
            					$num = 0;
            					while($row = $result->fetch_assoc()){
            						$sql2 = "SELECT COUNT(*) as TOTAL FROM subject_curriculum WHERE curriculum_id = '".$row['curriculum_id']."'";
            						$result2 = $conn->query($sql2);
            						$row2 = $result2->fetch_assoc();
            						if($num==0){
										echo '"'.$row2['TOTAL'].'"';
										$num++;
									}
									else
										echo ','.'"'.$row2['TOTAL'].'"';
            					}
            			?>],
            		backgroundColor: [
                		'rgba(255, 99, 132, 0.2)',
                		'rgba(54, 162, 235, 0.2)',
                		'rgba(255, 206, 86, 0.2)',
                		'rgba(75, 192, 192, 0.2)',
                		'rgba(153, 102, 255, 0.2)',
                		'rgba(255, 159, 64, 0.2)'
            		],
            		borderColor: [
                		'rgba(255,99,132,1)',
                		'rgba(54, 162, 235, 1)',
                		'rgba(255, 206, 86, 1)',
                		'rgba(75, 192, 192, 1)',
                		'rgba(153, 102, 255, 1)',
                		'rgba(255, 159, 64, 1)'
            		],
            		borderWidth: 1
        		}]
    		},
    		options: {
        		scales: {
            		yAxes: [{
                		ticks: {
                    		beginAtZero:true
                		}
            		}]
        		}
    		}
		});
	</script>
	</body>
</html>