<?php

class SchoolFee extends Connect{

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
            date_entered date NOT NULL,
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