<?php

require_once('../../../src/db/connect.php');

session_start();

if(!isset($_SESSION['ID'])) {
    header('Location: /login/');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Absences</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/src/styles/style.css">
</head>
<body id="gridContainer">
	<? require_once('../../../src/utils/header.php'); ?>
	<div class="index">
		<div class="welcome">
         <b>Absence insertion</b>
		</div>
	</div>
	<form action="form.php" method="POST">
		<div class="formInput">
			<input type="text" name="firstName" id="firstName" placeholder="Student First Name">
			<input type="text" name="secondName" id="secondName" placeholder="Student Second Name">
			<input type="text" name="date" id="date" placeholder="Date">
			<input type="submit" name="Add Absence" id="addAbsence" value="Add Absence">
			<div class="button2">
				<a href="index.php">Back</a>
			</div>
		</div>
	</form>
	<? require_once('../../../src/utils/footer.php'); ?>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$firstName = filter_input(INPUT_POST,"firstName");
	$secondName = filter_input(INPUT_POST,"secondName");
	$date = filter_input(INPUT_POST,"date");

	if(empty($firstName)){
		$err[]="Please enter first name<br>";
	}

	if(empty($secondName)){
		$err[]="Please enter second name<br>";
	}

	if(empty($date)){
		$err[]="Please enter date<br>";
	}

	if(count($err)>0){
		foreach($err as $error) {
			echo "$error<br>";
		}
	}

	try {
		$student = $db->prepare('SELECT ID from Users WHERE firstName = :firstName AND secondName = :secondName');
		$student->bindParam(':firstName',$firstName,PDO::PARAM_STR);
		$student->bindParam(':secondName',$secondName,PDO::PARAM_STR);
		$student->execute();
		$studentDetails = $student->fetch(PDO::FETCH_ASSOC);
	 } catch (Exception $e) {
		echo $e;
	 }	

	 try {
		$subject = $db->prepare('SELECT ID from Subjects WHERE userID = :id');
		$subject->bindParam(':id',$_SESSION['ID'],PDO::PARAM_STR);
		$subject->execute();
		$subjectDetails = $subject->fetch(PDO::FETCH_ASSOC);
	 } catch (Exception $e) {
		echo $e;
	 }	

	 try {
		$absence = $db->prepare('INSERT INTO Attendance(studentID, subjectID, date) VALUES (:student, :subject, :date)');
		$absence->bindParam(':student',$studentDetails['ID'],PDO::PARAM_STR);
		$absence->bindParam(':subject',$subjectDetails['ID'],PDO::PARAM_STR);
		$absence->bindParam(':date',$date,PDO::PARAM_STR);
		$absence->execute();
	 } catch (Exception $e) {
		echo $e;
	 }	
}
