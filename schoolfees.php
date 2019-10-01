<?php
 require 'functions/db.php';
 require 'functions/schoolfee.php';

 $schoolfee = new Schoolfee();

 if (isset($_POST['addfeetrans'])) {

    $schoolfee->createFeeTrans();

}elseif (isset($_POST['updatefeetrans'])) {
     
}elseif (isset($_POST['searchstudent'])) {
    
    if (empty($st) && !empty($cl)) {
        $sql = "SELECT * FROM students WHERE class LIKE '%$cl%' ";
    }elseif (empty($cl) && !empty($st)) {
        $sql = "SELECT * FROM students WHERE lname LIKE '%$st%' ";
    }elseif (!empty($st) && !empty($cl)) {
        $sql = "SELECT * FROM students WHERE lname LIKE '%$st%' AND class LIKE '%$cl%' ";
    }
    $result = $schoolfee->getSchoolfee($sql);

    foreach ($result as $key => $value) {
        $reg = $value['reg'];
    }
    $sql1 = "SELECT * FROM schoolfees WHERE regid = '$reg' ";
 
}
 ?>