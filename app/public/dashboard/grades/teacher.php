<?php

require_once('../../src/db/connect.php');

session_start();

$query = $db->prepare('SELECT subjectName from Subjects WHERE userID = :id');
$query->bindParam(':id',$_SESSION['ID'],PDO::PARAM_STR);
$query->execute();
$subject = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Grades</title>
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
				<th>Grade</th>
				<th>Notes</th>
			</tr>
			<?php 
			
			$stmt = $db->prepare('SELECT * from Grades WHERE teacherID = :id');
			$stmt->bindParam(':id',$_SESSION['ID'],PDO::PARAM_STR);
			$stmt->execute();
			$grades = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($grades as $grade) {
				echo "	<tr>
							<th>".$grade['studentID']."</th>
							<th>".$grade['mark']."</th>
							<th>".$grade['note']."</th>
						</tr>";
			}

			require_once('../../src/utils/footer.php'); 
			
			?>
		</div>
	</body>
</html>