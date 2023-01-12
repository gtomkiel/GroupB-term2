<?php
	require_once("db/connect.php");
	try{
		$db= new PDO("mysql:host=mysql;dbname=project;charset=utf8","root","qwerty");//created a database connection
	}
	catch(Exception $ex){
		echo $ex;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Practice</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>
	<div id="gridContainer">
		<main class="registration">
	<?php
		$err=[];
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$firstName=filter_input(INPUT_POST,"firstName",FILTER_SANITIZE_SPECIAL_CHARS);
			$secondName=filter_input(INPUT_POST,"secondName",FILTER_SANITIZE_SPECIAL_CHARS);
			$email=filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
			$address=filter_input(INPUT_POST,"address",FILTER_SANITIZE_SPECIAL_CHARS);
			$phone=filter_input(INPUT_POST,"phone",FILTER_SANITIZE_SPECIAL_CHARS);
			$password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
			$repassword=filter_input(INPUT_POST,"repassword",FILTER_SANITIZE_SPECIAL_CHARS);
			$accountType=filter_input(INPUT_POST,"accountType",FILTER_SANITIZE_SPECIAL_CHARS);
			
			
			if(strlen($firstName) < 3){
				$err[]="Enter 3 or more characters for your firstname<br>";
			}
			
			if(empty($secondName)){
				$err[]="Please enter your secondname<br>";
			}
			
			if(strlen($secondName) < 3){
				$err[]="Enter 3 or more characters for your Secondname<br>";
			}
			
			if(empty($email)){
				$err[]="Please enter your email<br>";
			}
			
			if(substr($email,-3,3) !== "com"){
				$err[]="Enter a correct email address<br>";
			}
			if(empty($address)){
				$err[]="Please enter your address<br>";
			}
			
			if(empty($phone)){
				$err[]="Please enter your phone number<br>";
			}
			if(strlen($phone)<9 || strlen($phone)>13){
				$err[]="Enter a correct number";
			}
			
			if(empty($accountType)){
				$err[]="Please select an account<br>";
			}
			
			if(empty($password)||empty($repassword)){
				$err[]="Enter a password<br>";
			}
			
			if($password !== $repassword){
				$err[]="Passwords did not match";
			}elseif($password === $repassword){
				$vpassword = password_hash($password,PASSWORD_BCRYPT);
			}
			$uppercase = preg_match('@[A-Z]@', $password);
			$lowercase = preg_match('@[a-z]@', $password);
			$number = preg_match('@[0-9]@', $password);

			if(!$uppercase || !$lowercase || !$number || strlen($password)<8){
				$err[]= "The password should be atleast 8 characters in length and 
						  contain atleast one uppercase, one lowercase, one number ";
			}
			
			$user="SELECT accountType from Users WHERE accountType=:accountType";//checks if principal account already exists
			$stmt = $db->prepare($user);
			$stmt->bindParam('accountType',$accountType,PDO::PARAM_STR);
			$stmt->execute();
			
			if($stmt-> fetchColumn() == "Principal"){ 
				$err[]="Principal account already exists";
			}
			
			$mail="SELECT id from Users WHERE email=:email";//checks if the email address already exists in the database
			$stmt = $db->prepare($mail);
			$stmt->bindParam('email',$email,PDO::PARAM_STR);
			$stmt->execute();
			if($result = $stmt-> fetchColumn()){ 
				$err[]="Email account already exists";
			}
		
			if(count($err)>0){
				foreach($err as $error){
							echo "$error<br>";
					}
			}
			else{
				try{
					$stmt=$db->prepare("INSERT INTO `Users`(`firstName`, `secondName`, `address`, `phone`, `email`, `password`, `accountType`) VALUES (:firstName,:secondName,:address,:phone,:email,:password,:accountType)");
					$stmt->bindParam('firstName',$firstName,PDO::PARAM_STR);
					$stmt->bindParam('secondName',$secondName,PDO::PARAM_STR);
					$stmt->bindParam('address',$address,PDO::PARAM_STR);
					$stmt->bindParam('phone',$phone,PDO::PARAM_STR);
					$stmt->bindParam('email',$email,PDO::PARAM_STR);
					$stmt->bindParam('password',$vpassword,PDO::PARAM_STR);
					$stmt->bindParam('accountType',$accountType,PDO::PARAM_STR);
					$stmt->execute();
					echo "<p>Data entered successfully</p>";
					echo "<button type='button'><a href='Overview.php'>OK</a></button>";
				}
				catch(Exception $ex){
					echo $ex;
				}
			}
		}
		else{
			echo'	<div class="form">
				<form action="#" method="Post">
					<label for="firstName">Firstname: </label>
					<div>
						<input type="text" name="firstName">
					</div>
					
					<label for="secondNameName">Secondname: </label>
					<div> 
						<input type="text" name="secondName">
					</div>
					
					<label for="address">Address: </label>
					<div>
						<input type="text" name="address">
					</div>
					
					<label for="phone">Phone: </label>
					<div>
						<input type="text" name="phone">
					</div>
					
					<label for="email">Email: </label>
					<div>
						<input type="text" name="email">
					</div>
					
					<label for="password">Password: </label>
					<div>
						<input type="password" name="password">
					</div>
					
					<label for="repassword">Confirm Password: </label>
					<div>
						<input type="password" name="repassword">
					</div>
					
					<label for="accountType">Account Type:</label>
					<select name="accountType">
					  <option value="Principal">Principal</option>
					  <option value="Teacher">Teacher</option>
					  <option value="Admin">Administrator</option>
					  <option value="Parent">Parent</option>
					</select>
					<input type="submit" name="submit">
				</form>
			</div>';
		}
	?>
		</main>
	</div>
</body>
<html>