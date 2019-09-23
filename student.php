<?php 



class Student extends Connect{
    
    public function createStudent(){
        $sql = "CREATE TABLE IF NOT EXISTS students (
            id INT PRIMARY KEY AUTO_INCREMENT,
            lname VARCHAR(20),
            fname VARCHAR(20),
            oname VARCHAR(20),
            class VARCHAR(10),
            table VARCHAR(10)
            )";
            $this->link->query($sql);
    }

    public function addStudent(){
        $sql = "INSERT INTO students 
                (lname,fname,oname,class,table) 
                VALUES 
                ('$ln','$fn','$on','$cl','$tbl')";
        $this->link->query($sql);
    }
    
    public function updateStudent(){
        $sql = "UPDATE TABLE students 
            SET lname='$ln',
                fname='$fn',
                oname='$on',
                class='$cl',
                table='$tbl' WHERE id='$sid' ";
        $this->link->query($sql);
    }
    
    public function searchForStudent(){
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