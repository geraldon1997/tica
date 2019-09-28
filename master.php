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

            $create = $student->createStudent();
            // $add = $student->addStudent($reg,$ln,$fn,$on,$cl,$tbl);
            $createfee = $schoolfee->createSchoolFee();
            // $addfee = $schoolfee->addSchoolFee($reg,65000);
            $acct = $account->createAccount();
            
}    

execute();
// echo $session;

