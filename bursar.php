<?php 

class Bursar{

    public function createBursar(){
        $sql = "CREATE TABLE IF NOT EXISTS bursars (
            id INT PRIMARY KEY AUTO_INCREMENT,
            lname VARCHAR(20) NOT NULL,
            fname VARCHAR(20) NOT NULL,
            oname VARCHAR(20),
            username VARCHAR(20) NOT NULL,
            passwd VARCHAR(20) NOT NULL
        )";
        $this->link->query($sql);
    }

    public function addBursar($ln,$fn,$on,$user,$pwd){
        $sql = "INSERT INTO bursars (
            lname,
            fname,
            oname,
            username,
            passwd
        ) VALUES (
            '$ln',
            '$fn',
            '$on',
            '$user',
            '$pwd'
        )";

        $this->link->query($sql);
    }

    public function updateBursar($ln,$fn,$on,$user,$pwd,$bid){
        $sql = "UPDATE bursars SET
            lname = '$ln',
            fname = '$fn',
            oname = '$on',
            username = '$user',
            passwd = '$pwd' WHERE id = '$bid' ";

        $this->link->query($sql);
    }

    public function hashpwd($pwd){
        $pwd = sha1($pwd);
        return $pwd;
    }

}