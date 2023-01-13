<?php

require_once '../../src/db/connect.php';

session_start();

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
			<?php require_once('../../src/utils/header.php') ?>
			<div class="info">
				<ul>	
					<li><?=$_SESSION['firstName']." ".$_SESSION['secondName']?></li>
				</ul>
			</div>
			
			<table id="Grades">
			<tr>
				<th>Subject</th>
				<th>Grade</th>
			</tr>
			<?php 
			
			$stmt = $db->prepare('SELECT * from Attendance WHERE studentID = :id');
			$stmt->bindParam(':id',$_SESSION['ID'],PDO::PARAM_STR);
			$stmt->execute();
			$absences = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($absences as $absence) {
				echo "	<tr>
							<th>".$absence['subjectID']."</th>
							<th>".$absence['date']."</th>
						</tr>";
			}

			require_once('../../src/utils/footer.php'); 
			
			?>
		</div>
	</body>	
</html>
