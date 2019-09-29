<?php

require 'db.php';
require 'account.php';
require 'student.php';
require 'schoolfee.php';
require 'bursar.php';

$m = date('m');
$y = date('Y');

switch ($m) {
    case $m >= 9 && $m = 12:
        $term = 'first term';
        break;
    
    case $m = 1 && $m <= 4:
        $term = 'second term';
        break;

    case $m = 5 && $m <= 8:
        $term = 'third term';
        break;
}

switch ($m) {
    case $m >= 9 && $m = 12:
        $session = $y.' / '.($y + 1);
        break;
    
    case $m >= 1 && $m <= 8:
        $session = ($y - 1).' / '.$y;
}
 
function execute(){
    
    $student = new Student();
    $account = new Account();
    $schoolfee = new Schoolfee();
    $bursar = new Bursar();
    $reg = ceil(rand(111,9999));
    $date = date('d/m/Y');


            if (isset($_POST['addstudent'])) {
                $ln = $_POST['ln'];
                $fn = $_POST['fn'];
                $on = $_POST['on'];
                $cl = $_POST['cl']; 
                $tbl = $_POST['tbl'];
                
                $create = $student->createStudent();
                $add = $student->addStudent($reg,$ln,$fn,$on,$cl,$tbl);
                $createfee = $schoolfee->createSchoolFee();
                $addfee = $schoolfee->addSchoolFee($reg,65000);
                $acct = $account->createAccount();
                $addacct = $account->addAccount($reg,$date);

            }elseif (isset($_POST['addbursar'])) {

                $ln = $_POST['ln'];
                $fn = $_POST['fn'];
                $on = $_POST['on'];
                $user = $_POST['user']; 
                $pwd = $_POST['pass'];
                $createBursar = $bursar->createBursar();
                $pwd = $bursar->hashpwd($pwd);
                $addBursar = $bursar->addBursar($ln,$fn,$on,$user,$pwd);

            }elseif (isset($_POST['addtransaction'])) {
                $createtransaction = $account->createTransaction();
            }elseif (isset($_POST['addschfee'])) {
                $createSchoolFee = $schoolfee->createFeeTrans();
            }elseif (isset($_POST['search'])) {

                $studentname = $_POST['student'];
                $classname = $_POST['class'];
                
                if (!empty($studentname) && empty($classname)) {
                    $sql = "SELECT * FROM students WHERE sname LIKE '%$studentname%' ";
                }elseif (empty($studentname) && !empty($classname)) {
                    $sql = "SELECT * FROM students WHERE class LIKE '%$classname%' ";
                }elseif (!empty($studentname) && !empty($classname)) {
                    $sql = "SELECT * FROM students WHERE sname LIKE '%$studentname%' AND class LIKE '%$classname%' ";
                }
                
                $view = $student->getData($sql);
                echo "    <table border=1>
                <th>last name</th>
                <th>first name</th>
                <th>other name</th>
                <th>class</th>
                <th>table</th>
                <th>actions</th>";
                foreach ($view as $key => $value) {
                    $reg = $value['reg'];
                    $lname = $value['lname'];
                    $fname = $value['fname'];
                    $oname = $value['oname'];
                    $class = $value['class'];
                    $table = $value['tbl'];

                    echo "<tr>
                    <td>$lname</td>
                    <td>$fname</td>
                    <td>$oname</td>
                    <td>$class</td>
                    <td>$table</td>
                    <td>
                        <a href='update.php?regno=$reg'>update student profile</a>
                    </td>
                </tr>";
                }
                echo "</table>";
            }elseif (isset($_POST['updatestudent'])) {
                $ln = $_POST['ln'];
                $fn = $_POST['fn'];
                $on = $_POST['on'];
                $cl = $_POST['cl']; 
                $tbl = $_POST['tbl'];
                $reg = $_POST['reg'];
                $student->updateStudent($reg,$ln,$fn,$on,$cl,$tbl);
            }
}    

execute();

