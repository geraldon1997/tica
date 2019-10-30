<?php

require 'functions/db.php';
require 'functions/account.php';

$account = new Account();

if (isset($_POST['addtrans'])) {
    $ai = $_POST['acct_id'];
    $rg = $_POST['reg_id'];
    $ba = $_POST['bal'];
    $am = $_POST['amount'];
    $tt = $_POST['trans_type'];

    $bl = $ba - $am;

    $account->addTransaction($ac,$am,$tr,$b);
    $account->updateAccout($rg,$bl);
}elseif (isset($_POST['searchaccount'])) {
    $st = $_POST['st'];
    $cl = $_POST['cl'];
    if (empty($st) && !empty($cl)) {
        $sql = "SELECT * FROM students, accounts WHERE class LIKE '%$cl%' AND reg = regid ";
    }elseif (empty($cl) && !empty($st)) {
        $sql = "SELECT * FROM students, accounts WHERE lname LIKE '%$st%' AND reg = regid ";
    }elseif (!empty($st) && !empty($cl)) {
        $sql = "SELECT * FROM students, accounts WHERE lname LIKE '%$st%' AND class LIKE '%$cl%' AND reg = regid ";
    }

    $result = $account->getAccount($sql);
    echo "<table border='2'>
    <th>last name</th>
    <th>first name</th>
    <th>other name</th>
    <th>class</th>
    <th>table</th>
    <th>account balance</th>
    <th>last transaction date</th>
    <th>actions</th>";
    foreach ($result as $key => $value) {
        $rg = $value['reg'];
        $ln = $value['lname'];
        $fn = $value['fname'];
        $on = $value['oname'];
        $cl = $value['class'];
        $tl = $value['tbl'];
        $bl = $value['balance'];
        $lt = $value['date_updated'];

        echo "<tr>
        <td>$ln</td>
        <td>$fn</td>
        <td>$on</td>
        <td>$cl</td>
        <td>$tl</td>
        <td>$bl</td>
        <td>$lt</td>
        <td>action</td>
    </tr>";
    } 
    echo "</table>";
}
?>

<form action="" method="post">
    <input type="text" name="st" id="">
    <input type="text" name="cl" id="">
    <input type="submit" value="search" name="searchaccount">
</form>