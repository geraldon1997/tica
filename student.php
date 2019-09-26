<?php 

class Student extends Connect{

    public function __construct() {
        parent::__construct();
    }
    
    public function createStudent(){
        $sql = "CREATE TABLE IF NOT EXISTS students (
            id INT PRIMARY KEY AUTO_INCREMENT,
            lname VARCHAR(20) NOT NULL,
            fname VARCHAR(20) NOT NULL,
            oname VARCHAR(20),
            class VARCHAR(10) NOT NULL,
            tbl VARCHAR(10) NOT NULL
            )";
            
            $this->link->query($sql);
    }

    public function addStudent($ln,$fn,$on,$cl,$tbl){
        $sql = "INSERT INTO students (
            lname,
            fname,
            oname,
            class,
            tbl
            ) VALUES (
            '$ln',
            '$fn',
            '$on',
            '$cl',
            '$tbl'
            )";

        $this->link->query($sql);
    }
    
    public function updateStudent($ln,$fn,$on,$cl,$tbl,$sid){
        $sql = "UPDATE TABLE students 
            SET lname='$ln',
                fname='$fn',
                oname='$on',
                class='$cl',
                tbl='$tbl' WHERE id='$sid' ";

        $this->link->query($sql);
    }
    
    public function searchForStudent($student,$class){

        if (!empty($_POST['student']) && empty($_POST['class'])) {
            $sql = "SELECT * FROM students WHERE sname LIKE '%$student%' ";
        }elseif (empty($_POST['student']) && !empty($_POST['class'])) {
            $sql = "SELECT * FROM students WHERE class LIKE '%$class%' ";
        }elseif (!empty($_POST['student']) && !empty($_POST['class'])) {
            $sql = "SELECT * FROM students WHERE sname LIKE '%$student%' AND class LIKE '%$class%' ";
        }
        
        $this->link->query($sql);
    }
    
}