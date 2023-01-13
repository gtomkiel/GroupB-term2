<?php

require_once '../src/db/connect.php';

session_start();

if(!isset($_SESSION['ID'])) {
    header('Location: /login/');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Overview Page</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../src/styles/style.css">
</head>
<body id="gridContainer">
	<?php require_once('../src/utils/header.php') ?>
	<div class="index">
		<div class="welcome">
         <b>Welcome <?=$_SESSION['firstName']?> <?=$_SESSION['secondName']?>!</b>
		</div>
	</div>
	<?php

	$stmt = $db->prepare('SELECT accountType FROM Users WHERE ID = :id');
	$stmt->bindParam(':id', $_SESSION['ID'], PDO::PARAM_STR);
	$stmt->execute();

	$type = $stmt->fetch(PDO::FETCH_ASSOC);

	if($type['accountType'] == 'Parent') {
		echo '	<div class="firstTextBox">
					<a href="grades/">
						<div class="grades">
							<b>Grades</b>
						</div>
					</a>
				</div>';

		echo '	<div class="firstTextBox">
					<a href="absences/">
						<div class="grades">
							<b>Absences</b>
						</div>
					</a>
				</div>';
	}

	if($type['accountType'] == 'Teacher') {
		echo '	<div class="firstTextBox">
					<a href="grades/teacher/">
						<div class="grades">
							<b>Grades</b>
						</div>
					</a>
				</div>';

		echo '	<div class="firstTextBox">
					<a href="absences/teacher">
						<div class="grades">
							<b>Absences</b>
						</div>
					</a>
				</div>';
	}

	if($type['accountType'] == 'Admin') {
		echo '	<div class="firstTextBox">
					<a href="register/">
						<div class="grades">
							<b>Register</b>
						</div>
					</a>
				</div>';

		echo '	<div class="firstTextBox">
					<a href="events/">
						<div class="grades">
							<b>Events</b>
						</div>
					</a>
				</div>';
	}

	?>
	
	<? require_once('../src/utils/footer.php'); ?>

</body>
</html>
