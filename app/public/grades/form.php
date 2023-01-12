<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Form</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../src/styles/style.css">
</head>
<body id="gridContainer">
	<div class="index">
		<div class="welcome">
         <b>Welcome back <?/*=$_SESSION['firstName']*/?></b>
		</div>
	</div>
	<form action="form.php" method="POST">
	<div class="formInput">
	<input type="text" name="name" id="name" placeholder="Student Name">
	<input type="text" name="subject" id="subject" placeholder="Subject">
    <input type="number" name="mark" id="mark" value="Mark" placeholder="Mark">
    <textarea name="notes" placeholder="Notes"></textarea>
     <input type="submit" name="Add Grade" id="addGrade" value="Add">
   </div>
	</form>
	<? require_once('../footer.php'); ?>
</body>
</html>
