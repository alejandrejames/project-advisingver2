<?php
	include 'connection.php';

	$studid = $_POST['studid'];
	if(!isset($_POST['sem'])){
		$schlyr = 1;
		$sem = 1;
		$sql = "SELECT * FROM student_subject,subject WHERE student_subject.subject_id = subject.subject_id AND student_id = '".$studid."' AND student_schlyr_id = '".$schlyr."' AND semester = '".$sem."'";
	}
	else{
		if(!isset($schlyr))
			$schlyr = 0;
		else
			$schlyr = $_POST['schlyr'];
		$sem = $_POST['sem'];
		$sql = "SELECT * FROM student_subject,subject WHERE student_subject.subject_id = subject.subject_id AND student_id = '".$studid."' AND student_schlyr_id = '".$schlyr."' AND semester = '".$sem."'";
	}

	
	if($conn->query($sql)!=true)
		echo 'No subjects advised';
	else{
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
			echo '
				<tr>
					<td>'.$row['subject_name'].'</td>
					<td>'.$row['subject_description'].'</td>
					<td><input type="number" class="form-control" id="studgrdinp'.$row['subject_id'].'" value="'.$row['subject_grade'].'" min="1.0" max="5.0"></td>
					<td><button class="btn btn-success" onclick="updtgrd('.$row['subject_id'].')">Update</button></td>
				</tr>
				';
		}
	}
?>