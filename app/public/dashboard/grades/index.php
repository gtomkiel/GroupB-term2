<?php

require_once '../../src/db/connect.php';

session_start();

if(!isset($_SESSION['ID'])) {
    header('Location: /login/');
    exit();
}

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
			<?php require_once('../../src/utils/header.php') ?>
			<div class="info">
				<ul>	
					<li><?=$_SESSION['firstName']." ".$_SESSION['secondName']?></li>
					<li><a href="/dashboard/">Go back</a></li>
				</ul>
			</div>
			
			<table id="Grades">
			<tr>
				<th>Subject</th>
				<th>Grade</th>
				<th>Notes</th>
			</tr>
			<?php 

			try {
				$stmt = $db->prepare('SELECT Grades.mark, Grades.note, Subjects.subjectName FROM Grades INNER JOIN Subjects ON Grades.subjectID = Subjects.ID WHERE studentID = :id');
				$stmt->bindParam(':id',$_SESSION['ID'],PDO::PARAM_STR);
				$stmt->execute();
				$grades = $stmt->fetchAll(PDO::FETCH_ASSOC);
			 } catch (Exception $e) {
				echo $e;
			 }

			foreach ($grades as $grade) {
				echo "	<tr>
							<th>".$grade['subjectName']."</th>
							<th>".$grade['mark']."</th>
							<th>".$grade['note']."</th>
						</tr>";
			}

			require_once('../../src/utils/footer.php'); 
			
			?>
		</div>
	</body>	
</html>
