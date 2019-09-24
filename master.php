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
        $session = $y.' / '.$y + 1;
        break;
    
    default:
        # code...
        break;
}

function hashpwd($pwd){
    $pwd = sha1($pwd);
    return $pwd;
}
 
function execute(){
    
    $student = new Student();
    $account = new Account();
    $schoolfee = new Schoolfee();
    $bursar = new Bursar();
        
        if (isset($_POST['addstudent'])) {    
            
            $create = $student->createStudent();
            $add = $student->addStudent();
            $acct = $student->createAccount();
            $addacct = $account->addAccount();
            $createfee = $schoolfee->createSchoolFee();
            $addfee = $schoolfee->addSchoolFee();

        }elseif (isset($_POST['addtransaction'])) {
            
            $create = $account->createTransaction();
            $add = $account->addTransaction();
        
        }elseif (isset($_POST['addschoolfee'])) {
        
            $create = $schoolfee->createFeeTrans();
            $add = $schoolfee->addFeeTrans();
        
        }elseif (isset($_POST['updatestudent'])) {
        
            $update = $student->updateStudent();

        }elseif (isset($_POST['addbursar'])) {
            
            $create = $bursar->createBursar();
            $add = $bursar->addBursar();
        
        }
}    

// execute();
echo $session;