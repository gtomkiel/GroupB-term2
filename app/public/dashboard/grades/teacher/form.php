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
      <title>Grades</title>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" type="text/css" href="/src/styles/style.css" />
   </head>
   <body id="gridContainer">
      <? require_once('../../../src/utils/header.php'); ?>
      <div class="index">
         <div class="welcome">
            <b>Grade insertion</b>
         </div>
      </div>
      <form action="form.php" method="POST">
         <div class="formInput">
            <input type="text" name="firstName" id="firstName" placeholder="Student First Name" />
            <input type="text" name="secondName" id="secondName" placeholder="Student Second Name" />
            <input type="text" name="mark" id="mark" placeholder="Mark" />
            <input type="text" name="note" id="note" placeholder="Note" />
            <input type="submit" name="Add Grade" id="addGrade" value="Add" />
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
	$mark = filter_input(INPUT_POST,"mark");
	$note = filter_input(INPUT_POST,"note");

	$student = $db->prepare('SELECT ID from Users WHERE firstName = :firstName AND secondName = :secondName');
	$student->bindParam(':firstName',$firstName,PDO::PARAM_STR);
	$student->bindParam(':secondName',$secondName,PDO::PARAM_STR);
	$student->execute();
	$studentDetails = $student->fetch(PDO::FETCH_ASSOC);

	$subject = $db->prepare('SELECT ID from Subjects WHERE userID = :id');
	$subject->bindParam(':id',$_SESSION['ID'],PDO::PARAM_STR);
	$subject->execute();
	$subjectDetails = $subject->fetch(PDO::FETCH_ASSOC);

	$grade = $db->prepare('INSERT INTO Grades(mark, note, subjectID, studentID, teacherID) VALUES (:mark, :note, :subject, :student, :teacher)');
	$grade->bindParam(':mark',$mark,PDO::PARAM_STR);
	$grade->bindParam(':note',$note,PDO::PARAM_STR);
	$grade->bindParam(':subject',$subjectDetails['ID'],PDO::PARAM_STR);
	$grade->bindParam(':student',$studentDetails['ID'],PDO::PARAM_STR);
	$grade->bindParam(':teacher',$_SESSION['ID'],PDO::PARAM_STR);
	$grade->execute();	
}
