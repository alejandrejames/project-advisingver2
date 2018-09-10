<?php
	include '../backend/connection.php';
	$pagelvl = "2";

	$currid = $_GET['currid'];
	$sql = "SELECT * FROM curriculum,college WHERE curriculum.college_id = college.college_id AND curriculum_id='".$currid."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$bclink = $row['curriculum_name'];
	$collid = $row['college_id'];
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
			  <li><a href="../view/curriculums.php">All Curriculum</a></li>
			  <li class="active"><?php echo $bclink;?></li>
			</ol>
			<div class="container-fluid">
				<div class="col-md-4">
					<div id="notif-area"></div>
					<div class="panel panel-default">
						<div class="panel-heading">
					    	<h3 class="panel-title">Edit Subject Details</h3>
						</div>
					  	<div class="panel-body">
					    	<button class="btn btn-success" id="editcurriculumdet">Edit</button>
					    	<input type="text" id="editcurrid" value="<?php echo $currid?>" hidden>
					    	<div class="form-group">
					    		<label for="editcurriculumname"></label>
					    		<input type="text" class="form-control" id="editcurriculumname" placeholder="Curriculum Name" disabled value="<?php echo $bclink?>">
					    		<label for="editcollege"></label>
					    		<select class="form-control" id="editcollege" disabled>
					    			<?php
					    				$sql = "SELECT * FROM college";
					    				$result = $conn->query($sql);
					    				while($row = $result->fetch_assoc()){
					    					if($row['college_id']==$collid)
					    						echo '<option class="active" value="'.$row['college_id'].'">'.$row['college_name'].'</option>';
					    					else
					    						echo '<option value="'.$row['college_id'].'">'.$row['college_name'].'</option>';
					    				}
					    			?>
					    		</select>
					    	</div>
					    	<div class="col-md-12">
					    		<button class="btn btn-success" id="updatecurriculum" style="display: none;">Update</button>
					    	</div>
					  	</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">Add subject listing</h3>
					  </div>
					  <div class="panel-body">
					    <div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Subject Code</th>
										<th>Subject Name</th>
										<th>1st Year</th>
										<th>2nd Year</th>
										<th>3rd Year</th>
										<th>4th Year</th>
									</tr>
								</thead>
								<tbody id="addsubjectcurr">
									<?php
										$sql = "SELECT * FROM subject";
										$result = $conn->query($sql);
										while($row = $result->fetch_assoc()){
											echo '
												<tr>
													<td>'.$row['subject_name'].'</td>
													<td>'.$row['subject_description'].'</td>
													<td>
														<div class="btn-group" role="group">
														    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														      1st Year
														    	<span class="caret"></span>
														    </button>
														    <ul class="dropdown-menu">
														      <li><a href="#" onclick="addcursub(1,1,'.$row['subject_id'].')">1st Sem</a></li>
														      <li><a href="#" onclick="addcursub(1,2,'.$row['subject_id'].')">2nd Sem</a></li>
														      <li><a href="#" onclick="addcursub(1,3,'.$row['subject_id'].')">Summer</a></li>
														    </ul>
														</div>		
													</td>
													<td>
														<div class="btn-group" role="group">
														    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														      2nd Year
														    	<span class="caret"></span>
														    </button>
														    <ul class="dropdown-menu">
														      <li><a href="#" onclick="addcursub(2,1,'.$row['subject_id'].')">1st Sem</a></li>
														      <li><a href="#" onclick="addcursub(2,2,'.$row['subject_id'].')">2nd Sem</a></li>
														      <li><a href="#" onclick="addcursub(2,3,'.$row['subject_id'].')">Summer</a></li>
														    </ul>
														</div>		
													</td>
													<td>
														<div class="btn-group" role="group">
														    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														     3rd Year
														    	<span class="caret"></span>
														    </button>
														    <ul class="dropdown-menu">
														       <li><a href="#" onclick="addcursub(3,1,'.$row['subject_id'].')">1st Sem</a></li>
														      <li><a href="#" onclick="addcursub(3,2,'.$row['subject_id'].')">2nd Sem</a></li>
														      <li><a href="#" onclick="addcursub(3,3,'.$row['subject_id'].')">Summer</a></li>
														    </ul>
														</div>		
													</td>
													<td>
														<div class="btn-group" role="group">
														    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														      4th Year
														    	<span class="caret"></span>
														    </button>
														    <ul class="dropdown-menu">
														       <li><a href="#" onclick="addcursub(4,1,'.$row['subject_id'].')">1st Sem</a></li>
														      <li><a href="#" onclick="addcursub(4,2,'.$row['subject_id'].')">2nd Sem</a></li>
														      <li><a href="#" onclick="addcursub(4,3,'.$row['subject_id'].')">Summer</a></li>
														    </ul>
														</div>		
													</td>
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
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
					    	<h3 class="panel-title">Curriculum Subjects</h3>
					  	</div>
					  	<div class="panel-body">
					  		<ul class="nav nav-tabs">
					  			 <li role="presentation" class="active"><a href="#1styrsubs" aria-controls="products" role="tab" data-toggle="tab">1st Year</a></li>
					  			<li role="presentation"><a href="#2ndyrsubs" aria-controls="products" role="tab" data-toggle="tab">2nd Year</a></li>
					  			<li role="presentation"><a href="#3rdyrsubs" aria-controls="products" role="tab" data-toggle="tab">3rd Year</a></li>
					  			<li role="presentation"><a href="#4thyrsubs" aria-controls="products" role="tab" data-toggle="tab">4th Year</a></li>
							</ul>
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="1styrsubs">
									<div class="container-fluid">
										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-heading">
											    	<h3 class="panel-title">1st Sem</h3>
											  	</div>
											  	<div class="panel-body">
											  		<div class="table-responsive">
											  			<table class="table table-striped">
											  				<thead>
											  					<tr>
											  						<th>Subject Code</th>
											  						<th>Subject Name</th>
											  						<th>Remove</th>
												  				</tr>
											  				</thead>
											  				<tbody id="tbodysublist11">
											  					<tr>
											  						<td>CS21</td>
											  						<td>Discrete</td>
											  						<td><button class="btn btn-danger">Remove</button></td>
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
											    	<h3 class="panel-title">2nd Sem</h3>
											  	</div>
											  	<div class="panel-body">
											  		<div class="table-responsive">
											  			<table class="table table-striped">
											  				<thead>
											  					<tr>
											  						<th>Subject Code</th>
											  						<th>Subject Name</th>
											  						<th>Remove</th>
												  				</tr>
											  				</thead>
											  				<tbody id="tbodysublist12">
											  					<tr>
											  						<td>CS21</td>
											  						<td>Discrete</td>
											  						<td><button class="btn btn-danger">Remove</button></td>
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
											    	<h3 class="panel-title">Summer Sem</h3>
											  	</div>
											  	<div class="panel-body">
											  		<div class="table-responsive">
											  			<table class="table table-striped">
											  				<thead>
											  					<tr>
											  						<th>Subject Code</th>
											  						<th>Subject Name</th>
											  						<th>Remove</th>
												  				</tr>
											  				</thead>
											  				<tbody id="tbodysublist13">
											  					<tr>
											  						<td>CS21</td>
											  						<td>Discrete</td>
											  						<td><button class="btn btn-danger">Remove</button></td>
											  					</tr>
											  				</tbody>
											  			</table>
											  		</div>
											  	</div>
											</div>
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="2ndyrsubs">
									<div class="container-fluid">
										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-heading">
											    	<h3 class="panel-title">1st Sem</h3>
											  	</div>
											  	<div class="panel-body">
											  		<div class="table-responsive">
											  			<table class="table table-striped">
											  				<thead>
											  					<tr>
											  						<th>Subject Code</th>
											  						<th>Subject Name</th>
											  						<th>Remove</th>
												  				</tr>
											  				</thead>
											  				<tbody id="tbodysublist21">
											  					<tr>
											  						<td>CS21</td>
											  						<td>Discrete</td>
											  						<td><button class="btn btn-danger">Remove</button></td>
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
											    	<h3 class="panel-title">2nd Sem</h3>
											  	</div>
											  	<div class="panel-body">
											  		<div class="table-responsive">
											  			<table class="table table-striped">
											  				<thead>
											  					<tr>
											  						<th>Subject Code</th>
											  						<th>Subject Name</th>
											  						<th>Remove</th>
												  				</tr>
											  				</thead>
											  				<tbody id="tbodysublist22">
											  					<tr>
											  						<td>CS21</td>
											  						<td>Discrete</td>
											  						<td><button class="btn btn-danger">Remove</button></td>
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
											    	<h3 class="panel-title">Summer Sem</h3>
											  	</div>
											  	<div class="panel-body">
											  		<div class="table-responsive">
											  			<table class="table table-striped">
											  				<thead>
											  					<tr>
											  						<th>Subject Code</th>
											  						<th>Subject Name</th>
											  						<th>Remove</th>
												  				</tr>
											  				</thead>
											  				<tbody id="tbodysublist23">
											  					<tr>
											  						<td>CS21</td>
											  						<td>Discrete</td>
											  						<td><button class="btn btn-danger">Remove</button></td>
											  					</tr>
											  				</tbody>
											  			</table>
											  		</div>
											  	</div>
											</div>
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="3rdyrsubs">
									<div class="container-fluid">
										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-heading">
											    	<h3 class="panel-title">1st Sem</h3>
											  	</div>
											  	<div class="panel-body">
											  		<div class="table-responsive">
											  			<table class="table table-striped">
											  				<thead>
											  					<tr>
											  						<th>Subject Code</th>
											  						<th>Subject Name</th>
											  						<th>Remove</th>
												  				</tr>
											  				</thead>
											  				<tbody id="tbodysublist31">
											  					<tr>
											  						<td>CS21</td>
											  						<td>Discrete</td>
											  						<td><button class="btn btn-danger">Remove</button></td>
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
											    	<h3 class="panel-title">2nd Sem</h3>
											  	</div>
											  	<div class="panel-body">
											  		<div class="table-responsive">
											  			<table class="table table-striped">
											  				<thead>
											  					<tr>
											  						<th>Subject Code</th>
											  						<th>Subject Name</th>
											  						<th>Remove</th>
												  				</tr>
											  				</thead>
											  				<tbody id="tbodysublist32">
											  					<tr>
											  						<td>CS21</td>
											  						<td>Discrete</td>
											  						<td><button class="btn btn-danger">Remove</button></td>
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
											    	<h3 class="panel-title">Summer Sem</h3>
											  	</div>
											  	<div class="panel-body">
											  		<div class="table-responsive">
											  			<table class="table table-striped">
											  				<thead>
											  					<tr>
											  						<th>Subject Code</th>
											  						<th>Subject Name</th>
											  						<th>Remove</th>
												  				</tr>
											  				</thead>
											  				<tbody id="tbodysublist33">
											  					<tr>
											  						<td>CS21</td>
											  						<td>Discrete</td>
											  						<td><button class="btn btn-danger">Remove</button></td>
											  					</tr>
											  				</tbody>
											  			</table>
											  		</div>
											  	</div>
											</div>
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="4thyrsubs">
									<div class="container-fluid">
										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-heading">
											    	<h3 class="panel-title">1st Sem</h3>
											  	</div>
											  	<div class="panel-body">
											  		<div class="table-responsive">
											  			<table class="table table-striped">
											  				<thead>
											  					<tr>
											  						<th>Subject Code</th>
											  						<th>Subject Name</th>
											  						<th>Remove</th>
												  				</tr>
											  				</thead>
											  				<tbody id="tbodysublist41">
											  					<tr>
											  						<td>CS21</td>
											  						<td>Discrete</td>
											  						<td><button class="btn btn-danger">Remove</button></td>
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
											    	<h3 class="panel-title">2nd Sem</h3>
											  	</div>
											  	<div class="panel-body">
											  		<div class="table-responsive">
											  			<table class="table table-striped">
											  				<thead>
											  					<tr>
											  						<th>Subject Code</th>
											  						<th>Subject Name</th>
											  						<th>Remove</th>
												  				</tr>
											  				</thead>
											  				<tbody id="tbodysublist42">
											  					<tr>
											  						<td>CS21</td>
											  						<td>Discrete</td>
											  						<td><button class="btn btn-danger">Remove</button></td>
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
											    	<h3 class="panel-title">Summer Sem</h3>
											  	</div>
											  	<div class="panel-body">
											  		<div class="table-responsive">
											  			<table class="table table-striped">
											  				<thead>
											  					<tr>
											  						<th>Subject Code</th>
											  						<th>Subject Name</th>
											  						<th>Remove</th>
												  				</tr>
											  				</thead>
											  				<tbody id="tbodysublist43">
											  					<tr>
											  						<td>CS21</td>
											  						<td>Discrete</td>
											  						<td><button class="btn btn-danger">Remove</button></td>
											  					</tr>
											  				</tbody>
											  			</table>
											  		</div>
											  	</div>
											</div>
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
	<script type="text/javascript" src="../js/curriculumfuncs.js"></script>
	</body>
</html>