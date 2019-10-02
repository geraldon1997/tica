<?php
 require 'functions/db.php';
 require 'functions/schoolfee.php';

 $schoolfee = new Schoolfee();

 if (isset($_POST['addfeetrans'])) {

    $schoolfee->createFeeTrans();

}elseif (isset($_POST['updatefeetrans'])) {
     
}elseif (isset($_POST['searchstudent'])) {

    $st = $_POST['st'];
    $cl = $_POST['cl'];
    
    if (empty($st) && !empty($cl)) {
        $sql = "SELECT * FROM students, schoolfees WHERE class LIKE '%$cl%' AND reg = regid ";
    }elseif (empty($cl) && !empty($st)) {
        $sql = "SELECT * FROM students, schoolfees WHERE lname LIKE '%$st%' AND reg = regid ";
    }elseif (!empty($st) && !empty($cl)) {
        $sql = "SELECT * FROM students, schoolfees WHERE lname LIKE '%$st%' AND class LIKE '%$cl%' AND reg = regid ";
    }

    $result = $schoolfee->getSchoolfee($sql);

    foreach ($result as $key => $value) {
        echo $reg = $value['reg'];

    }
    
}
 ?>


<form action="" method="post">
    <input type="text" name="st" id="">
    <input type="text" name="cl" id="">
    <input type="submit" value="search" name="searchstudent">
</form>



<table border='2'>
            <th>last name</th>
            <th>first name</th>
            <th>other name</th>
            <th>class</th>
            <th>fees</th>
            <th>amount paid</th>
            <th>balance</th>
            <th>payment status</th>
</table>