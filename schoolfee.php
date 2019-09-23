<?php



class SchoolFee extends Connect{
    public function createSchoolFee(){
        $sql = "CREATE TABLE IF NOT EXISTS schoolfees (
            id INT PRIMARY KEY AUTO_INCREMENT,
            stid INT,
            fee INT,
            FOREIGN KEY(sid) REFERENCES students(id)
        )";
        $this->link->query($sql);
    }

    public function createFeeTrans(){

    }
}