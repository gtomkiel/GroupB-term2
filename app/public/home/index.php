<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link type="text/css" rel="stylesheet" href="../src/styles/style.css">
   <title>Home</title>
</head>
<body id="gridContainer">
<?php require_once('../src/utils/header.php'); ?>
	<div id="main">
		<div  class="currentEventContainer">
			<div class="welcomeBox">De Morgenster,  welcome!</div>
			<div class="currentEvent">
				<h1>Christmas Event</h1>
				<p>Date: 21.12.2022</p>
				<p>Time: 10:00-15:00</p>
			</div>
		</div> 
		<div class="schoolKid"> 
			<img class="img" src="../src/img/school 1.png" alt="Boy in class">  
		</div>
		<div class="eventBox">
			<a href="#" class="event">
				<div>
					Event
				</div>
			</a>
			<a href="../login/" class="login">
				<div>
					Login
				</div>
			</a>
			<div class="placeHolder">
			</div>
		</div>
		<div class="emptyBox">
		</div>
   </div>
   <? require_once('../src/utils/footer.php'); ?>
</body>
</html>
