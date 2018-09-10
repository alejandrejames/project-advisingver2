<?php
		include 'connection.php';
		$collegeid = $_POST['collegeid'];

		$sql = "SELECT * FROM curriculum WHERE college_id = '".$collegeid."'";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
			echo '<option value="'.$row['curriculum_id'].'">'.$row['curriculum_name'].'</option>';
		}
?>