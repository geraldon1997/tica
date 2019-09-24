<?php

require 'db.php';
require 'account.php';
require 'student.php';
require 'schoolfee.php';
require 'bursar.php';

$d = date('m');

switch ($d) {
    case $d >= 9 && $d <= 12:
        $term = 'first term';
        break;
    
    case $d >= 1 && $d <= 4:
        $term = 'second term';
        break;

    case $d :
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

execute();
