<?php

require_once('../../src/db/connect.php');

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
	<title>Events</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="/src/styles/style.css">
</head>
	<body>
		<div id="gridContainer">
			<?php require_once('../../src/utils/header.php');?>
			<div class="info2">
				<ul>	
					<li><a href="add.php">Add event</a></li>
					<li><a href="/dashboard/">Go back</a></li>
				</ul>
			</div>
			
			<table id="Grades">
			<tr>
				<th>Date</th>
				<th>Name</th>
			</tr>
			<?php 
			
			$stmt = $db->prepare('SELECT * FROM Events');
			$stmt->execute();
			$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($events as $event) {
				echo "	<tr>
							<th>".$event['name']."</th>
							<th>".$event['date']."</th>
						</tr>";
			}

			require_once('../../src/utils/footer.php'); 
			
			?>
		</div>
	</body>
</html>
