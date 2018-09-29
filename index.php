<?php
	include 'backend/connection.php';
	$pagelvl = '1';
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
			<div class="form-group">
          		<input type="text" class="form-control" placeholder="Search">
        	</div>
        	<div class="btn-group btn-group-justified" role="group" aria-label="...">
			  <div class="btn-group" role="group">
			    <button type="submit" class="btn btn-default">Submit</button>
			  </div>
			</div>
			<div class="col-md-12"><BR></div>
			<div class="container-fluid">
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
					    	<h3 class="panel-title">Students Per College</h3>
					  	</div>
					  	<div class="panel-body">
					    	<canvas id="studentchart"></canvas>
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
    		type: 'bar',
    		data: {
        		labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        		datasets: [{
            		label: '# of students',
            		data: [12, 19, 3, 5, 2, 3],
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