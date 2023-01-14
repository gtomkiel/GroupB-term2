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
	<title>Events</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/src/styles/style.css">
</head>
<body id="gridContainer">
	<? require_once('../../src/utils/header.php'); ?>
	<div class="index">
		<div class="welcome">
         <b>Event insertion</b>
		</div>
	</div>
	<form action="#" method="POST">
		<div class="formInput">
			<input type="text" name="name" id="name" placeholder="Event name">
			<input type="text" name="date" id="date" placeholder="Date">
			<input type="submit" name="Add Absence" id="addAbsence" value="Add Event">
			<div class="button2">
				<a href="index.php">Back</a>
			</div>
		</div>
	</form>
	<? require_once('../../src/utils/footer.php'); ?>
</body>
</html>

<? 

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $name = filter_input(INPUT_POST,"name");
   $date = filter_input(INPUT_POST,"date");

   if(empty($name)) {
      $err[]="Please enter name<br>";
   }

   if(empty($date)) {
      $err[]="Please enter date<br>";
   }

   if(count($err)>0) {
      foreach($err as $error){
         echo "$error<br>";
      }
   }

   try {
      $event = $db->prepare('INSERT INTO Events(name, date) VALUES (:name, :date)');
      $event->bindParam(':name',$name,PDO::PARAM_STR);
      $event->bindParam(':date',$date,PDO::PARAM_STR);
      $event->execute();
   } catch (Exception $e) {
      echo $e;
   }	
}

require_once('../../src/utils/footer.php'); 

?>
