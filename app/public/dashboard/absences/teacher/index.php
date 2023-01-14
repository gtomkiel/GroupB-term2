<?php

require_once('../../../src/db/connect.php');

session_start();

if(!isset($_SESSION['ID'])) {
    header('Location: /login/');
    exit();
}

try {
	$query = $db->prepare('SELECT ID, subjectName from Subjects WHERE userID = :id');
	$query->bindParam(':id',$_SESSION['ID'],PDO::PARAM_STR);
	$query->execute();
	$subject = $query->fetch(PDO::FETCH_ASSOC);
 } catch (Exception $e) {
	echo $e;
 }

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
			<?php require_once('../../../src/utils/header.php');?>
			<div class="info2">
				<ul>	
					<li><?=$subject['subjectName']?></li>
					<li><a href="form.php">Add absence</a></li>
					<li><a href="/dashboard/">Go back</a></li>
				</ul>
			</div>
			
			<table id="Grades">
			<tr>
				<th>Student</th>
				<th>Date</th>
			</tr>
			<?php 

			try {
				$stmt = $db->prepare('SELECT Attendance.date, Users.firstName, Users.secondName FROM Attendance INNER JOIN Users ON Attendance.studentID = Users.ID WHERE subjectID = :id');
				$stmt->bindParam(':id',$subject['ID'],PDO::PARAM_STR);
				$stmt->execute();
				$absences = $stmt->fetchAll(PDO::FETCH_ASSOC);
			 } catch (Exception $e) {
				echo $e;
			 }
            
			foreach ($absences as $absence) {
				echo "	<tr>
							<th>".$absence['firstName']." ".$absence['secondName']."</th>
							<th>".$absence['date']."</th>
						</tr>";
			}

			require_once('../../../src/utils/footer.php'); 
			
			?>
		</div>
	</body>
</html>
