<?php
	include 'connection.php';

	$code = $_GET['code'];

	switch ($code) {
		case '1':
			$sql = "SELECT * FROM subject LIMIT 0,10";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
											$sql2 = "SELECT * FROM subject_curriculum WHERE subject_id = '".$row['subject_id']."'";
											$result2 = $conn->query($sql2);
											if($result2->fetch_assoc() > 0)
												{}
											else
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
			break;
		case '2':
			$year = $_GET['year'];
			$sem = $_GET['sem'];
			$sql = "SELECT * FROM subject,subject_curriculum WHERE subject.subject_id = subject_curriculum.subject_id AND subject_yrlvl = '".$year."' AND subject_semester = '".$sem."'";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				echo '
					<tr>
						<td>'.$row['subject_name'].'</td>
						<td>'.$row['subject_description'].'<br>
							<a href="#" data-toggle="modal" data-target="#preqmodal" onclick="managepreq('.$row['subject_id'].')">Manage Prequisites</a>
						</td>
						<td><button class="btn btn-danger" onclick="removecursub('.$row['subject_id'].','.$row['subject_yrlvl'].','.$row['subject_semester'].')">Remove</button></td>
					</tr>
					';
				}
			break;
		default:
			# code...
			break;
	}
?>