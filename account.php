<?php 

class Account extends Connect{

    public function __construct(){
        parent::__construct();
    }

    public function createAccount(){
        $sql = "CREATE TABLE IF NOT EXISTS accounts (
            id INT PRIMARY KEY AUTO_INCREMENT,
            stid INT NOT NULL,
            balance INT NOT NULL,
            date_updated date,
            FOREIGN KEY(sid) REFERENCES students(id)
        )";
        $this->link->query($sql);
    }

    public function createTransaction(){
        $sql = "CREATE TABLE IF NOT EXISTS transactions (
            id INT AUTO_INCREMENT,
            acct_id INT NOT NULL,
            amount INT NOT NULL,
            trans_type VARCHAR(10) NOT NULL,
            bursar_id INT NOT NULL,
            date_updated date,
            FOREIGN KEY(acct_id) REFERENCES accounts(id)
        )";
    }

    public function addAccount(){
        $sql = "INSERT INTO accounts (
            stid,
            balance
        ) VALUES (
            '$sid',
            '$bal'
        )";
    }

    public function addTransaction($ac,$am,$tr,$b){
        $sql = "INSERT INTO transactions (
            acct_id,
            amount,
            trans_type,
            bursar
        ) VALUES (
            '$ac',
            '$am',
            '$tr',
            '$b'
        )";
    }

    public function searchForAccount($sid){
        $sql = "SELECT * FROM accounts WHERE `sid`='$sid' ";
    }

    public function viewAccountTransactions($acct_id){
        $sql = "SELECT * FROM transactions WHERE `acct_id` = '$acct_id' ";
    }
}