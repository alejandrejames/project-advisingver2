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
			  <li class="active">All Students</li>
			</ol>
			<div class="container-fluid">
				<input type="text" id="search-type" value="students" hidden>
				<input type="text" class="form-control" name="subjectsearchbar" placeholder="Enter student name or Student ID" id="searchbar">
				<!--<div class="col-md-6">
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
				</div>-->
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
							<tbody id="tbodyallstud" class="pagina-tbl srch-rslt">
								<?php
									$sql = "SELECT * FROM student,college,curriculum WHERE student.college_id=college.college_id AND student.curriculum_id = curriculum.curriculum_id LIMIT 0,10";
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
				<div id="pagina-sect">
					<?php
						$sql = "SELECT COUNT(*) AS TOTAL FROM student,college,curriculum WHERE student.college_id=college.college_id AND student.curriculum_id = curriculum.curriculum_id";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
						$total = $row['TOTAL'];
						$numpages = $total/10;
						$pagenum = 10;
						$pagenumper = 0;

						echo '<input type="number" id="totpages" value="'.$numpages.'" hidden>
								<nav aria-label="Page Navigation">
								<ul class="pagination">';
						for($i=0;$i<$numpages;$i++){
							if($i==0)
								echo '<li class="active" id="page-'.$i.'"><a href="#" onclick="pagination('.$i.',6,0,'.$pagenum.')">'.($i+1).'</a></li>';
							else 
								echo '<li class="" id="page-'.$i.'"><a href="#" onclick="pagination('.$i.',6,'.$pagenumper.','.($pagenum = $pagenumper+$pagenum).')">'.($i+1).'</a></li>';
						}
					?>
				</div>
			</div>		
		</div>
	<!--Scripts-->
	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/create2.js"></script>
	<script type="text/javascript" src="../js/userdeffunc2.js"></script>
	<script type="text/javascript" src="../js/pagination.js"></script>
	<script type="text/javascript" src="../js/search.js"></script>
	</body>
</html>