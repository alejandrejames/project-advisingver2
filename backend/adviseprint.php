<?php
	include 'connection.php';

	$studid = $_POST['studid'];
    $currid = $_POST['currid'];
	$schlyr = $_POST['schlyr'];
	$yrlvl = $_POST['yrlvl'];
	$sem = $_POST['sem'];

	$sql = "SELECT * FROM student_subject,subject WHERE student_subject.subject_id = subject.subject_id AND student_id = '".$studid."' AND curriculum_id = '".$currid."' AND student_schlyr_id = '".$schlyr."' AND year_level = '".$yrlvl."' AND semester = '".$sem."'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		echo '
			<tr>
				<td>'.$row['subject_name'].'</td>
				<td>'.$row['subject_description'].'</td>
				<td><center>'.$row['credit_unit'].'</center></td>
			</tr>
		';
	}

	$sql = "SELECT SUM(credit_unit) AS TOTAL FROM student_subject,subject WHERE student_subject.subject_id = subject.subject_id AND student_id = '".$studid."' AND curriculum_id = '".$currid."' AND student_schlyr_id = '".$schlyr."' AND year_level = '".$yrlvl."' AND semester = '".$sem."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	echo '
		<tr>
			<td>  </td>
			<td>  </td>
			<td><b><center><u>'.$row['TOTAL'].'</u><br>Total Units</center></b></td>
		</tr>
	';
?>