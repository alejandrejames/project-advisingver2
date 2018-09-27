<?php
	include 'connection.php';

	$studid = $_GET['studid'];
	$currid = $_GET['currid'];
	$schlyr = $_GET['schlyr'];
	$yrlvl = $_GET['yrlvl'];
	$sem = $_GET['sem'];
	$code = $_GET['code'];

	switch ($code) {
		case '1':
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
		break;

		case '2':
			$sql = "SELECT * FROM subject_curriculum,subject WHERE subject_curriculum.subject_id = subject.subject_id AND curriculum_id = '".$currid."'";
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
		
		default:
			# code...
			break;
	}
?>