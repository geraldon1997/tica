<?php

require 'functions/db.php';
require 'function/students.php';

$student = new Student();
$reg = ceil(rand(1111,9999));

if (isset($_POST['addstudent'])) {

    $ln = $_POST['ln'];
    $fn = $_POST['fn'];
    $on = $_POST['on'];
    $cl = $_POST['cl'];
    $tl = $_POST['tl'];
    $student->createStudent();
    $student->addStudent($reg,$ln,$fn,$on,$cl,$tl);

}elseif (isset($_POST['updatestudent'])) {
    
    $reg = $_POST['reg'];
    $ln = $_POST['ln'];
    $fn = $_POST['fn'];
    $on = $_POST['on'];
    $cl = $_POST['cl'];
    $tl = $_POST['tl'];
    $student->updateStudent($reg,$ln,$fn,$on,$cl,$tl);

}elseif (isset($_POST['searchstudent'])) {

    if (empty($st) && !empty($cl)) {
        $sql = "SELECT * FROM students WHERE class LIKE '%$cl%' ";
    }elseif (empty($cl) && !empty($st)) {
        $sql = "SELECT * FROM students WHERE lname LIKE '%$st%' ";
    }elseif (!empty($st) && !empty($cl)) {
        $sql = "SELECT * FROM students WHERE lname LIKE '%$st%' AND class LIKE '%$cl%' ";
    }

    $student->getStudent($sql);

}

?>