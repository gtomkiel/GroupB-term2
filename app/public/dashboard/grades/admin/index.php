<?php

require_once('../../../src/db/connect.php');

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
			<?php require_once('../../../src/utils/header.php');?>
			<div class="info2">
				<ul>	
					<li>Admin Page</li>
					<li><a href="form.php">Add grade</a></li>
					<li><a href="/dashboard/">Go back</a></li>
				</ul>
			</div>
			
			<table id="Grades">
			<tr>
				<th>Student</th>
				<th>Grade</th>
				<th>Notes</th>
				<th>Action</th>
			</tr>
			<?php 

			try {
				$stmt = $db->prepare('SELECT Grades.ID, Grades.mark, Grades.note, Users.firstName, Users.secondName FROM Grades INNER JOIN Users ON Grades.studentID = Users.ID');
				$stmt->execute();
				$grades = $stmt->fetchAll(PDO::FETCH_ASSOC);
			 } catch (Exception $e) {
				echo $e;
			 }

			foreach ($grades as $grade) {
				echo "	<tr>
							<th>".$grade['firstName']." ".$grade['secondName']."</th>
							<th>".$grade['mark']."</th>
							<th>".$grade['note']."</th>
							<th><a href='delete.php?id=".$grade['ID']."'>Delete</a></th>
						</tr>";
			}

			require_once('../../../src/utils/footer.php'); 
			
			?>
		</div>
	</body>
</html>
