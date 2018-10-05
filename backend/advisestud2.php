<?php
	include 'connection.php';

	$studid = $_POST['studid'];
	$currid = $_POST['currid'];
	$schlyr = $_POST['schlyr'];
	$yrlvl = $_POST['yrlvl'];
	$sem = $_POST['sem'];

	if($yrlvl >=2){
		$sql = "SELECT * FROM "
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