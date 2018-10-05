<?php
	include 'connection.php';

	$book = $_POST['book'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	if(isset($_POST['adddata']))
		$adddata = $_POST['adddata'];

	switch ($book) {
		case '1':
			$sql = "SELECT * FROM subject LIMIT ".$start.",".$end."";
			$result = $conn->query($sql);
			$num = $start;
			while($row = $result->fetch_assoc()){
				$num++;
				echo '
					<tr>
						<td>'.$num.'</td>
						<td>'.$row['subject_name'].'</td>
						<td>'.$row['subject_description'].'</td>
						<td><a href="../edit/subject.php?subid='.$row['subject_id'].'"><button class="btn btn-success">Edit</button></a></td>
					</tr>';
				}
			break;
		case '2':
			$sql = "SELECT * FROM curriculum,college WHERE curriculum.college_id = college.college_id LIMIT ".$start.",".$end."";
			$result = $conn->query($sql);
			$num = 0;
			while($row = $result->fetch_assoc()){
				$num++;
				echo '
					<tr>
						<td>'.$num.'</td>
						<td>'.$row['curriculum_name'].'</td>
						<td>'.$row['college_name'].'</td>
						<td><a href="../edit/curriculum.php?currid='.$row['curriculum_id'].'"><button class="btn btn-success">Edit</button></a></td>
					</tr>
				';
			}
			case '3':
				$sql = "SELECT * FROM subject WHERE subject_id != '".$adddata."' LIMIT ".$start.",".$end."";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
						$sql2 = "SELECT * FROM subject_preq WHERE subject_id = '".$adddata."' AND subject_id_preq = '".$row['subject_id']."'";
						$result2 = $conn->query($sql2);
						if($result2->fetch_assoc() != 0)
							{}
						else
							echo '
								<tr>
									<td>'.$row['subject_name'].'</td>
									<td>'.$row['subject_description'].'</td>
									<td><button type="text" class="btn btn-primary" onclick="addpreqsub('.$adddata.','.$row['subject_id'].')">Add</button></td>
								</tr>
						    ';
						}
				break;
			case '4':
				$sql = "SELECT * FROM subject LIMIT ".$start.",".$end."";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
					$sql2 = "SELECT * FROM subject_curriculum WHERE subject_id = '".$row['subject_id']."' AND curriculum_id = '".$adddata."'";
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
			case '5':
				$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND curriculum_id = '".$adddata."' LIMIT ".$start.",".$end."";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
					$sql2 = "SELECT * FROM student_subject WHERE subject_id = '".$row['subject_id']."'";
					$result2 = $conn->query($sql2);
					if($result2->fetch_assoc() == 0)
						echo '
							<tr>
								<td><button class="btn btn-success" onclick="advaddsub('.$row['subject_id'].')">Add</button></td>
								<td>'.$row['subject_name'].'</td>
								<td>'.$row['subject_description'].'</td>
							</tr>
						';
					}
				break;
			case '6':
				$sql = "SELECT * FROM student,college,curriculum WHERE student.college_id=college.college_id AND student.curriculum_id = curriculum.curriculum_id LIMIT ".$start.",".$end."";
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
				break;
		default:
			# code...
			break;
	}
?>