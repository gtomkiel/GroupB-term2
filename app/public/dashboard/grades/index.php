<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Overview Page</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="src/styles/style.css">
</head>
<body id="gridContainer">
	<div class="index">
		<div class="welcome">
         <b>Welcome back <?=$_SESSION['firstName']?></b>
		</div>
	</div>
	<div class="firstTextBox">
		<a href="form.php">
			<div class="grades">
				<b>Add</b>
			</div>
		</a>
	</div>
	<div class="secondTextBox">
		<a href="#">
			<div class="grades">
				<b>List</b>
			</div>
		</a>
	</div>
	<? require_once('footer.php'); ?>
</body>
</html>