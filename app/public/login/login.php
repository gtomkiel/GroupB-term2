<?php

require_once '../src/db/connect.php';

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
   if($_POST["email"] == NULL && $_POST["password"] == NULL) {
      echo "Missing email address or password";
      exit();
   }
   $email = filter_input(INPUT_POST, "email");
   $password = filter_input(INPUT_POST, "password");

   if(empty($email)){
      $err[]="Please enter the email<br>";
   }

   if(empty($password)){
      $err[]="Please enter the password<br>";
   }

   if(substr($email,-3,3) !== "com"){
      $err[]="Enter a correct email address<br>";
   }

   try {
      $stmt = $db->prepare('SELECT * FROM Users WHERE email = :email');
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->execute();
      $details = $stmt->fetch(PDO::FETCH_ASSOC);
   } catch (Exception $e) {
      echo $e;
   }

   if($stmt->rowCount() == 0) {
      echo "Wrong email address or password!";
      exit();
   } else {
      if(!password_verify($password, $details['password'])) {
         echo "Wrong email address or password!";
         exit();
      } else {
         $_SESSION["ID"] = $details["ID"];
         $_SESSION["firstName"] = $details["firstName"];
         $_SESSION["secondName"] = $details["secondName"];
   
         header('Location: ../dashboard');
         exit();
      }
   }
}

