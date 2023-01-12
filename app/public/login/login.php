<?php

require_once '../src/db/connect.php';

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
   $email = filter_input(INPUT_POST, "email");
   $password = filter_input(INPUT_POST, "password");

   try {
      $stmt = $db->prepare('SELECT * FROM Users WHERE email = :email');
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->execute();

      $details = $stmt->fetch(PDO::FETCH_ASSOC);
   } catch (Exception $e) {
      echo $e;
   }

   if(!password_verify($password, $details['password'])) {
      echo "Wrong email address or password!";
   } else {
      $_SESSION["ID"] = $details["ID"];
      $_SESSION["firstName"] = $details["firstName"];

      header('Location: ../Overview.php');
      exit();
   }
}
