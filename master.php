<?php
require 'db.php';
require 'account.php';
require 'student.php';
require 'schoolfee.php';
require 'bursar.php';
 
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
            
        }
}    

execute();
