<?php

require_once '../../src/db/connect.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Overview Page</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/src/styles/style.css">
</head>
<body id="gridContainer">
	<?php require_once('../../src/utils/header.php') ?>
	<div class="index">
		<div class="welcome">
         <b>Grades Page</b>
		</div>
	</div>
	<?php

	$stmt = $db->prepare('SELECT accountType FROM Users WHERE ID = :id');
	$stmt->bindParam(':id', $_SESSION['ID'], PDO::PARAM_STR);
	$stmt->execute();

	$type = $stmt->fetch(PDO::FETCH_ASSOC);

	if($type['accountType'] == 'Parent') {
		echo '	<div class="firstTextBox">
					<a href="list.php">
						<div class="grades">
							<b>List</b>
						</div>
					</a>
				</div>';
	}

	if($type['accountType'] == 'Teacher') {
		echo '	<div class="firstTextBox">
					<a href="teacher.php">
						<div class="grades">
							<b>List</b>
						</div>
					</a>
				</div>';
	}

	if($type['accountType'] == 'Teacher' || $type['accountType'] == 'Admin') {
	echo '	<div class="firstTextBox">
				<a href="form.php">
					<div class="grades">
						<b>Add</b>
					</div>
				</a>
			</div>';
	}

	require_once('../../src/utils/footer.php'); 
	
	?>
</body>
</html>
