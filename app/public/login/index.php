<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link type="text/css" rel="stylesheet" href="../src/styles/style.css">
    <title>Login</title>
</head>
<body id="gridContainer">
   <div class="formInput">
   <form action="login.php" method="POST">
	<input type="text" name="email" id="username" placeholder="Email">
	<input type="password" name="password" id="password" placeholder="Password">
   <input type="submit" name="login" id="login" value="Login">
	</form>
   </div>
   <?php require_once('../footer.php') ?>
</body>
</html>
