<?php

require 'functions/db.php';
require 'function/students.php';

$student = new Student();

if (isset($_POST['addstudent'])) {
    $student->createStudent();
}elseif (isset($_POST['updatestudent'])) {
    
}elseif (isset($_POST['searchstudent'])) {
    
}

?>