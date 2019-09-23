<?php
require 'db.php';
require 'account.php';
require 'student.php';
require 'schoolfee.php';
 
function execute(){
    $student = new Student();
    $account = new Account();
    $schoolfee = new Schoolfee();
        
        if (isset($_POST['addstudent'])) {    
            $create = $student->createStudent();
            $add = $student->addStudent();
            $acct = $student->createAccount();
            $addacct = $account->addAccount();
        }elseif (isset($_POST['addtransaction'])) {
            $create = $account->createTransaction();
            $add = $account->addTransaction();
        }elseif (isset($_POST['addschoolfee'])) {
            
        }elseif (isset($_POST['updatestudent'])) {
            
        }
}    

execute();
