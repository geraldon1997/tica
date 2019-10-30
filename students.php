<?php

require 'functions/db.php';
require 'functions/student.php';
require 'functions/schoolfee.php';
require 'functions/account.php';

$student = new Student();
$schoolfee = new SchoolFee();
$account = new Account();
$reg = ceil(rand(1111,9999));
$date = date('Y-m-d');

if (isset($_POST['addstudent'])) {

    $ln = $_POST['ln'];
    $fn = $_POST['fn'];
    $on = $_POST['on'];
    $cl = $_POST['cl'];
    $tl = $_POST['tl'];
    $student->createStudent();
    $student->addStudent($reg,$ln,$fn,$on,$cl,$tl);
    $schoolfee->addSchoolFee($reg,65000);
    $account->addAccount($reg,0,$date);

}elseif (isset($_POST['updatestudent'])) {
    
    $reg = $_POST['reg'];
    $ln = $_POST['ln'];
    $fn = $_POST['fn'];
    $on = $_POST['on'];
    $cl = $_POST['cl'];
    $tl = $_POST['tl'];
    $student->updateStudent($reg,$ln,$fn,$on,$cl,$tl);

}elseif (isset($_POST['searchstudent'])) {

    $st = $_POST['st'];
    $cl = $_POST['cl'];

    if (empty($st) && !empty($cl)) {
        $sql = "SELECT * FROM students WHERE class LIKE '%$cl%' ";
    }elseif (empty($cl) && !empty($st)) {
        $sql = "SELECT * FROM students WHERE lname LIKE '%$st%' ";
    }elseif (!empty($st) && !empty($cl)) {
        $sql = "SELECT * FROM students WHERE lname LIKE '%$st%' AND class LIKE '%$cl%' ";
    }

    $result = $student->getStudent($sql);

    echo "<table border=2>
    <th>last name</th>
    <th>first name</th>
    <th>other name</th>
    <th>class</th>
    <th>table</th>
    <th>actions</th>";
    foreach ($result as $key => $value) {
        $ln = $value['lname'];
        $fn = $value['fname'];
        $on = $value['oname'];
        $cl = $value['class'];
        $tl = $value['tbl'];

        echo "<tr>
        <td>$ln</td>
        <td>$fn</td>
        <td>$on</td>
        <td>$cl</td>
        <td>$tl</td>
        <td>update</td>
    </tr>";
    }
    echo "</table>";
}

?>

search student
<form action="" method="post">
    <input type="text" name="st" id="">
    <input type="text" name="cl" id="">
    <input type="submit" value="search" name="searchstudent">
</form>
add students
<form action="" method="post">
    <input type="text" name="ln" id="">
    <input type="text" name="fn" id="">
    <input type="text" name="on" id="">
    <input type="text" name="cl" id="">
    <input type="text" name="tl" id="">
    <input type="submit" value="submit" name="addstudent">
</form>

