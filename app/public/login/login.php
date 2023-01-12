<?php

require_once '../db/connect.php';

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link type="text/css" rel="stylesheet" href="../styles/style.css">
    <title>Login</title>
</head>
<body id="gridContainer">
   <div class="formInput">
   <form action="#" method="POST">
	<input type="text" name="email" id="username" placeholder="Email">
	<input type="password" name="password" id="password" placeholder="Password">
   <input type="submit" name="login" id="login" value="Login">
	</form>
   </div>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
   $email = filter_input(INPUT_POST, "email");
   $password = filter_input(INPUT_POST, "password");

   try {
      $stmt = $db->prepare('SELECT firstName, password, accountType FROM Users WHERE email = :email');
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->execute();

      $details = $stmt->fetch(PDO::FETCH_ASSOC);
   } catch (Exception $e) {
      echo $e;
   }

   if(!password_verify($password, $details['password'])) {
      echo "Wrong email address or password!";
   } else {
      $_SESSION["firstName"] = $details["firstName"];
      $_SESSION["accountType"] = $details["accountType"];
   }
}

