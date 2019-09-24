<?php

class SchoolFee extends Connect{

    public function createSchoolFee(){
        $sql = "CREATE TABLE IF NOT EXISTS schoolfees (
            id INT PRIMARY KEY AUTO_INCREMENT,
            stid INT NOT NULL,
            fee INT NOT NULL,
            FOREIGN KEY(sid) REFERENCES students(id)
        )";
        $this->link->query($sql);
    }

    public function createFeeTrans(){
        $sql = "CREATE TABLE IF NOT EXISTS feetrans(
            id INT PRIMARY KEY AUTO_INCREMENT,
            schfeeid INT NOT NULL,
            amount_paid INT NOT NULL,
            bursar_id INT NOT NULL,
            date_paid date,
            date_entered date,
            FOREIGN KEY(schfeeid) REFERENCES schoolfees(id),
            FOREIGN KEY(bursar_id) REFERENCES bursars(id)
        )";
        $this->link->query($sql);
    }

    public function addFeeTrans(){
        $sql = "INSERT INTO feetrans (
            schfeeid,
            amount_paid,
            bursar_id,
            date_paid,
            date_entered,
        ) VALUES (

        )";
    }

}