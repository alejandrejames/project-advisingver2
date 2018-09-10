<?php
	include 'connection.php';

	$code = $_GET['code'];
	$subid = $_GET['subid'];
	switch ($code) {
		case '1':
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
			break;
		case '2':
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
			break;
		default:
			# code...
			break;
	}
?>