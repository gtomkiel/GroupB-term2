<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link type="text/css" rel="stylesheet" href="src/styles/style.css">
    <title>Add Event</title>
</head>
<body id="gridContainer">
   <div class="formInput">
   <form action="login.html" method="POST">
	<input type="text" name="name" id="name" placeholder="Event Name">
	<input type="text" name="date" id="date" placeholder="Event Date">
   <input type="submit" name="Add Event" id="addEvent" value="Add Event">
	</form>
   </div>
   <? require_once('footer.php'); ?>
</body>
</html>
