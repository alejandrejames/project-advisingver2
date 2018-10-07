<?php
	include 'connection.php';

	 $fileName = $_FILES["file"]["tmp_name"];
	 $file = fopen($fileName, "r");

	 switch ($_GET['case']) {
	 	case '1':
	 		$num = 0;
	 		while (($data = fgetcsv($file, 10000, ",")) !== FALSE) {
	 		if($num==0)
	 			if(($data[0]=='subject_code') && ($data[1]=='subject_name') && ($data[2]=='lab_units') && ($data[3]=='lec_units') && ($data[4]=='cred_units'))
					{}
				else{
					echo '<div class="alert alert-danger" role="alert">ERROR - Incorrect file</div>';
					exit();
				}
	 		else{
	 			if($_GET['csvaddsubckbx'] ==1){
			 		$csvaddsubcurrid = $_GET['csvaddsubcurrid'];
			 		$csvaddsubyrlvl = $_GET['csvaddsubyrlvl'];
			 		$csvaddsubsem = $_GET['csvaddsubsem'];

			 		$sql = "INSERT INTO subject SET subject_name = '".$data[0]."', subject_description = '".$data[1]."', lab_unit = '".$data[2]."',lecture_unit = '".$data[3]."', credit_unit = '".$data[4]."'";
	 				$conn->query($sql);
	 				$sql2 = "INSERT INTO subject_curriculum SET subject_id = LAST_INSERT_ID(), curriculum_id='".$csvaddsubcurrid."', subject_yrlvl='".$csvaddsubyrlvl."', subject_semester='".$csvaddsubsem."'";
	 				$conn->query($sql2);
	 			}
				else{
					$sql = "INSERT INTO subject SET subject_name = '".$data[0]."', subject_description = '".$data[1]."', lab_unit = '".$data[2]."',lecture_unit = '".$data[3]."', credit_unit = '".$data[4]."'";
	 				$conn->query($sql);
				}
	 		}
	 		$num = 1;
	 	}
		echo '<div class="alert alert-success" role="alert">Successfully imported</div>';
	 		break;

	 	case '2':
	 		$num = 0;
	 		$colid = $_GET['csvaddstudcolid'];
	 		$currid = $_GET['csvaddstudcurrid'];
	 		while (($data = fgetcsv($file, 10000, ",")) !== FALSE) {
	 		if($num==0)
	 			if(($data[0]=='student_id') && ($data[1]=='student_fname') && ($data[2]=='student_lname') && ($data[3]=='student_yrlvl'))
					{}
				else{
					echo '<div class="alert alert-danger" role="alert">ERROR - Incorrect file</div>';
					exit();
				}
	 		else{
	 			$sql = "INSERT INTO student SET student_id = '".$data[0]."', student_fname = '".$data[1]."', student_lname = '".$data[2]."', student_yrlvl = '".$data[3]."', college_id = '".$colid."', curriculum_id = '".$currid."'";
	 			$conn->query($sql);
	 		}
	 		$num = 1;
	 	}
		echo '<div class="alert alert-success" role="alert">Successfully imported</div>';
	 		break;

	 	case '3':
	 		$num = 0;
	 		$currid = $_GET['csvupdtgrdcurrid'];
	 		$grd = $_GET['csvupdtgrdsub'];
	 		$schlyr = $_GET['csvupdtgrdschlyr'];
	 		$sem = $_GET['csvupdtgrdsem'];

	 		while (($data = fgetcsv($file, 10000, ",")) !== FALSE) {
	 		if($num==0)
	 			if(($data[0]=='student_id') && ($data[1]=='student_grade'))
					{}
				else{
					echo '<div class="alert alert-danger" role="alert">ERROR - Incorrect file</div>';
					exit();
				}
	 		else{
	 			$sql = "UPDATE student_subject SET subject_grade = '".$data[1]."' WHERE student_id = '".$data[0]."' AND student_schlyr_id = '".$schlyr."' AND curriculum_id = '".$currid."' AND subject_id = '".$grd."' AND semester = '".$sem."'";
	 			$conn->query($sql);
	 		}
	 		$num = 1;
	 	}
		echo '<div class="alert alert-success" role="alert">Successfully imported</div>';
	 		break;
	 	default:
	 		# code...
	 		break;
	 }
?>