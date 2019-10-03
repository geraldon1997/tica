<?php

require 'functions/db.php';
require 'functions/account.php';

$account = new Account();

if (isset($_POST['addtrans'])) {
    $account->addTransaction();
}elseif (isset($_POST['searchaccount'])) {
    $account->getAccount(); 
}
?>