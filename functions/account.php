<?php 

class Account extends Connect{

    public function __construct(){
        parent::__construct();
    }

    public function createAccount(){
        $sql = "CREATE TABLE IF NOT EXISTS accounts (
            id INT PRIMARY KEY AUTO_INCREMENT,
            regid INT NOT NULL,
            balance INT NOT NULL,
            date_updated DATE NOT NULL,
            FOREIGN KEY(regid) REFERENCES students(reg)
        )";
        
        $this->link->query($sql);
    }

    public function createTransaction(){
        $sql = "CREATE TABLE IF NOT EXISTS transactions (
            id INT PRIMARY KEY AUTO_INCREMENT,
            acct_id INT NOT NULL,
            amount INT NOT NULL,
            trans_type VARCHAR(10) NOT NULL,
            bursar_id INT NOT NULL,
            date_updated VARCHAR(20),
            FOREIGN KEY(acct_id) REFERENCES accounts(id),
            FOREIGN KEY(bursar_id) REFERENCES bursars(id)
        )";

        $this->link->query($sql);
    }

    public function addAccount($reg,$bal){
        $sql = "INSERT INTO accounts (
            regid,
            balance
        ) VALUES (
            '$reg',
            $bal
        )";

        $this->link->query($sql);
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

    public function getAccount($sql){
        $result = $this->link->query($sql);
        $rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
    }
}