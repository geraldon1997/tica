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
    foreach ($result as $key => $value) {
        echo $value['lname'];
        echo $value['balance'];
    } 
}
?>

<form action="" method="post">
    <input type="text" name="st" id="">
    <input type="text" name="cl" id="">
    <input type="submit" value="search" name="searchaccount">
</form>