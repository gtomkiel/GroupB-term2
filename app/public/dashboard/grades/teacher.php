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
					<li>Student:</li>
					<li>Class:</li>
				</ul>
			</div>
			
			<table id="Grades">
			<tr>
				<th>Student</th>
				<th>Subject</th>
				<th>Date of assignment</th>
				<th>Grade</th>
				<th>Notes</th>
			</tr>
			<?php require_once('../../src/utils/footer.php'); ?>
		</div>
	</body>
</html>