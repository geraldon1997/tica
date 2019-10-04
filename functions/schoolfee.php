<?php

class SchoolFee extends Connect{

    public function __construct()
    {
        parent::__construct();
    }

    public function createSchoolFee(){
        $sql = "CREATE TABLE IF NOT EXISTS schoolfees (
            id INT PRIMARY KEY AUTO_INCREMENT,
            regid INT NOT NULL,
            fee INT NOT NULL,
            FOREIGN KEY(regid) REFERENCES students(reg)
        )";
        
        $this->link->query($sql);
    }

    public function addSchoolFee($reg,$fee){
        $sql = "INSERT INTO schoolfees (
            regid,
            fee
        ) VALUES (
            '$reg',
            '$fee'
        )";

        $this->link->query($sql);
    }

    public function createFeeTrans(){
        $sql = "CREATE TABLE IF NOT EXISTS feetrans(
            id INT PRIMARY KEY AUTO_INCREMENT,
            schfeeid INT NOT NULL,
            amount_paid INT NOT NULL,
            bursar_id INT NOT NULL,
            date_paid date NOT NULL,
            term VARCHAR(20) NOT NULL,
            sess VARCHAR(20) NOT NULL,
            date_entered DATE NOT NULL,
            FOREIGN KEY(schfeeid) REFERENCES schoolfees(id),
            FOREIGN KEY(bursar_id) REFERENCES bursars(id)
        )";
        
        $this->link->query($sql);
    }

    public function addFeeTrans($schfeeid,$amount,$bursar,$date,$term,$sess){
        $sql = "INSERT INTO feetrans (
            schfeeid,
            amount_paid,
            bursar_id,
            date_paid,
            term,
            sess
        ) VALUES (
            '$schfeeid',
            '$amount',
            '$bursar',
            '$date',
            '$term',
            '$sess'
        )";

        $this->link->query($sql);
    }

    public function getSchoolfee($sql){
        $result = $this->link->query($sql);
        $rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
    }

}

$m = date('m');
$y = date('Y');

switch ($m) {
    case $m > 8 && $m <= 12:
        $term = 'first term';
        $session = $y.' / '.($y + 1);
        break;
    
    case $m >= 1 && $m <= 4:
        $term = 'second term';
        $session = ($y - 1).' / '.$y;
        break;

    case $m > 4 && $m <= 8:
        $term = 'third term';
        $session = ($y - 1).' / '.$y;
}