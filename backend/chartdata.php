<?php

	switch ($_GET['label']) {
		case '1':
			$sql = "SELECT * FROM curriculum";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				echo '"'.$row['curriculum_name'].'"'.',';
			}
			break;
		
		default:
			# code...
			break;
	}
?>