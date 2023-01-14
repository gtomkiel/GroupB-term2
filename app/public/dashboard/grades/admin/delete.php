<?php

require_once('../../../src/db/connect.php');

session_start();

if(!isset($_SESSION['ID'])) {
    header('Location: /login/');
    exit();
}

$id = $_GET['id'];

try {
    $grade = $db->prepare('DELETE FROM Grades WHERE ID = :id');
    $grade->bindParam(':id',$id,PDO::PARAM_INT);
    $grade->execute();
} catch(Exception $e) {
    echo $e;
}

header('Location: /dashboard/grades/admin');
exit();
