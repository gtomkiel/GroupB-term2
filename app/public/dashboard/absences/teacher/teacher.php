<?php

require_once('../../src/db/connect.php');

session_start();

$query = $db->prepare('SELECT ID, subjectName from Subjects WHERE userID = :id');
$query->bindParam(':id',$_SESSION['ID'],PDO::PARAM_STR);
$query->execute();
$subject = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Absences</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="/src/styles/style.css">
</head>
	<body>
		<div id="gridContainer">
			<?php require_once('../../src/utils/header.php');?>
			<div class="info2">
				<ul>	
					<li><?=$subject['subjectName']?></li>
				</ul>
			</div>
			
			<table id="Grades">
			<tr>
				<th>Student</th>
				<th>Date</th>
			</tr>
			<?php 
			
			$stmt = $db->prepare('SELECT * from Attendance WHERE subjectID = :id');
			$stmt->bindParam(':id',$subject['ID'],PDO::PARAM_STR);
			$stmt->execute();
			$absences = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
			foreach ($absences as $absence) {
				echo "	<tr>
							<th>".$absence['studentID']."</th>
							<th>".$absence['date']."</th>
						</tr>";
			}

			require_once('../../src/utils/footer.php'); 
			
			?>
		</div>
	</body>
</html>
