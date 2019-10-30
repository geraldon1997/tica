<?php

require 'functions/db.php';
require 'functions/schoolfee.php';

$sc = new SchoolFee();

$result  = $sc->getSchoolfee("SELECT * FROM students ");

echo $result; 