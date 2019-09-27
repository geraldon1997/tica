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
    $acct = $account->createAccount();
        // if (isset($_POST['addstudent'])) {    
        //     $ln=$_POST['ln'];
        //     $fn=$_POST['fn'];
        //     $on=$_POST['on'];
        //     $cl=$_POST['cl'];
        //     $tbl=$_POST['tbl'];
        //     $create = $student->createStudent();
        //     $add = $student->addStudent($ln,$fn,$on,$cl,$tbl);
        //     $acct = $account->createAccount();
        // //     $addacct = $account->addAccount();
        // //     $createfee = $schoolfee->createSchoolFee();
        // //     $addfee = $schoolfee->addSchoolFee();

        // // }elseif (isset($_POST['addtransaction'])) {
            
        // //     $create = $account->createTransaction();
        // //     // $add = $account->addTransaction();
        
        // // }elseif (isset($_POST['addschoolfee'])) {
        
        // //     $create = $schoolfee->createFeeTrans();
        // //     // $add = $schoolfee->addFeeTrans();
        
        // // }elseif (isset($_POST['updatestudent'])) {
        
        // //     // $update = $student->updateStudent();

        // // }elseif (isset($_POST['addbursar'])) {
            
        // //     $create = $bursar->createBursar();
        // //     $pwd = $bursar->hashpwd($_POST['password']);
        // //     // $add = $bursar->addBursar();
        
        // // }elseif (isset($_POST['searchstudent'])) {
        // //     // $search = $student->searchForStudent();
        // }
}    

execute();
// echo $session;

