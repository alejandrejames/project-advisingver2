<?php
	include 'connection.php';

	$code = $_GET['code'];
	$subid = $_GET['subid'];
	switch ($code) {
		case '1':
			$sql = "SELECT * FROM subject WHERE subject_id != '".$subid."' LIMIT 0,5";
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
						    										<td><button type="text" class="btn btn-danger" onclick="removepreqsub('.$subid.','.$row['subject_id_preq'].')">Remove</button></td>
						    									</tr>
						    								';
						    						}
			break;
			case '3':
				$sql = "SELECT COUNT(*) AS TOTAL FROM subject WHERE subject_id != '".$subid."'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				$total = $row['TOTAL'];
				$numpages = floor($total/5);
				$pagenum = 5;
				$pagenumper = $pagenum;

				echo '<input type="number" id="totpages2" value="'.$numpages.'" hidden>
						<nav aria-label="Page Navigation">
						<ul class="pagination">';
						for($i=0;$i<$numpages;$i++){
							if($i==0)
								echo '<li class="active" id="page2-'.$i.'"><a href="#" onclick="pagination2('.$i.',3,0,'.$pagenum.','.$subid.')">'.($i+1).'</a></li>';
							else 
								echo '<li class="" id="page2-'.$i.'"><a href="#" onclick="pagination2('.$i.',3,'.($pagenumper = $pagenumper+$pagenum).','.$pagenum.','.$subid.')">'.($i+1).'</a></li>';
						}
				break;
		default:
			# code...
			break;
	}
?>