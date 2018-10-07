<?php
	include 'connection.php';

	$studid = $_POST['studid'];
	$currid = $_POST['currid'];
	$schlyr = $_POST['schlyr'];
	$yrlvl = $_POST['yrlvl'];
	$sem = $_POST['sem'];

	if($yrlvl >=2 || $sem>=2){
		$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id=subject.subject_id AND curriculum_id = '".$currid."' AND subject_yrlvl ='".$yrlvl."' AND subject_semester = '".$sem."'";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
			$sql2 = "SELECT * FROM subject_preq WHERE subject_id = '".$row['subject_id']."' AND curriculum_id = '".$currid."'";
			//echo $sql2;
			$result2 = $conn->query($sql2);
			if($result2->fetch_assoc() <= 0){
				$sql4 = "INSERT INTO student_subject SET student_id = '".$studid."', subject_id = '".$row['subject_id']."', student_schlyr_id = '".$schlyr."', curriculum_id='".$currid."', semester='".$sem."', year_level='".$yrlvl."'";
				$conn->query($sql4);
			}
			else{
				while($row2 = $result2->fetch_assoc()){
					$sql3 = "SELECT * FROM student_subject WHERE subject_id = '".$row2['subject_id_preq']."' AND student_id = '".$studid."' AND curriculum_id = '".$currid."'";
					$result3 = $conn->query($sql3);
					while($row3 = $result3->fetch_assoc()){
						if($row3['subject_grade']<=3.0){
							$sql4 = "INSERT INTO student_subject SET student_id = '".$studid."', subject_id = '".$row['subject_id']."', student_schlyr_id = '".$schlyr."', curriculum_id='".$currid."', semester='".$sem."', year_level='".$yrlvl."'";
							$conn->query($sql4);
						}
						else{
							echo '<tr>
								<td>'.$row['subject_name'].'</td>
								<td>Unable to add subject due to uncomplied pre-requisite</td>
							</tr>';
						}
					}
				}
			}
		}
	}
	else{
		$sql = "SELECT * FROM subject,subject_curriculum WHERE curriculum_id = '".$currid."' AND subject_yrlvl = '".$yrlvl."' AND subject_semester = '".$sem."' AND subject.subject_id = subject_curriculum.subject_id";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
			$sql2 = "INSERT INTO student_subject SET student_id = '".$studid."', subject_id = '".$row['subject_id']."', student_schlyr_id = '".$schlyr."', curriculum_id='".$currid."', semester='".$sem."', year_level='".$yrlvl."'";
			$conn->query($sql2);
		}
	}

	$sql = "SELECT * FROM student_subject,subject WHERE student_subject.subject_id = subject.subject_id AND student_id = '".$studid."' AND student_schlyr_id = '".$schlyr."' AND year_level = '".$yrlvl."' AND semester = '".$sem."'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		echo '
			<tr>
				<td>'.$row['subject_name'].'</td>
				<td>'.$row['subject_description'].'</td>
				<td><button class="btn btn-danger" onclick="advremsub('.$row['subject_id'].')">Remove</button></td>
			</tr>';
	}
?>