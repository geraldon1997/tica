<?php 

class Student extends Connect{

    public function __construct() {
        parent::__construct();
    }
    
    public function createStudent(){
        $sql = "CREATE TABLE IF NOT EXISTS students (
            id INT PRIMARY KEY AUTO_INCREMENT,
            reg INT NOT NULL UNIQUE,
            lname VARCHAR(20) NOT NULL,
            fname VARCHAR(20) NOT NULL,
            oname VARCHAR(20),
            class VARCHAR(10) NOT NULL,
            tbl VARCHAR(10) NOT NULL
            )";
            
            $this->link->query($sql);
    }

    public function addStudent($reg,$ln,$fn,$on,$cl,$tbl){
        $sql = "INSERT INTO students (
            reg,
            lname,
            fname,
            oname,
            class,
            tbl
            ) VALUES (
            '$reg',
            '$ln',
            '$fn',
            '$on',
            '$cl',
            '$tbl'
            )";

        $this->link->query($sql);
    }
    
    public function updateStudent($reg,$ln,$fn,$on,$cl,$tbl){
        $sql = "UPDATE students 
            SET lname = '$ln',
                fname = '$fn',
                oname = '$on',
                class = '$cl',
                tbl = '$tbl' WHERE reg = '$reg' ";

        $this->link->query($sql);
    }
    
    public function getStudent($sql){
        $result = $this->link->query($sql);
        $rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
    }
    
}