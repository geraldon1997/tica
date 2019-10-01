<?php

include 'functions/db.php';
include 'functions/student.php';
include 'functions/account.php';
include 'functions/bursar.php';
include 'functions/schoolfee.php';

$s = new Student();
$a = new Account();
$b = new Bursar();
$sc = new SchoolFee();

$s->createStudent();

$a->createAccount();
$a->createTransaction();

$b->createBursar();

$sc->createSchoolFee();
$sc->createFeeTrans();