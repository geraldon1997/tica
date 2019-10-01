<?php
 require 'functions/db.php';
 require 'functions/schoolfee.php';

 $schoolfee = new Schoolfee();

 if (isset($_POST['addfeetrans'])) {
     $schoolfee->createFeeTrans();
 }elseif (isset($_POST['updatefeetrans'])) {
     
 }elseif (isset($_POST['searchstudent'])) {
     $schoolfee->getSchoolfee();
 }
 ?>