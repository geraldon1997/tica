<?php

define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DATABASE','tica');
 
class Connect{
    public $link;
    
    public function __construct(){
        $this->link = new mysqli(HOST,USER,PASSWORD,DATABASE);

        if (!$this->link) {
            echo "error in connection, contact administrator". mysqli_error($this->link);
        }
    }
}
