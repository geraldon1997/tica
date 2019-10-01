<?php

require 'functions/db.php';
require 'function/students.php';

$student = new Student();

if (isset($_POST['addstudent'])) {
    $student->createStudent();
    $student->addStudent();
}elseif (isset($_POST['updatestudent'])) {
    $student->updateStudent();
}elseif (isset($_POST['searchstudent'])) {
    $student->getStudent();
}

?>