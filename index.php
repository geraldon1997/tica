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

$b->createBursar();

$a->createAccount();
$a->createTransaction();

$sc->createSchoolFee();
$sc->createFeeTrans();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.css">
</head>
<body>

    <form action="" method="post" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="lastname">last name :</label>
            <input type="text" name="lname" id="" class="form-control" required>
            <div class="valid-feedback">valid</div>
            <div class="invalid-feedback">please this field is required</div>
        </div>
        <div class="form-group">
            <label for="lastname">first name :</label>
            <input type="text" name="fname" id="" class="form-control" required>
            <div class="valid-feedback">valid</div>
            <div class="invalid-feedback">please this field is required</div>
        </div>
        <div class="form-group">
            <label for="lastname">other name :</label>
            <input type="text" name="oname" id="" class="form-control" required>
            <div class="valid-feedback">valid</div>
            <div class="invalid-feedback">please this field is required</div>
        </div>
        <div class="form-group">
            <label for="lastname">class :</label>
            <input type="text" name="class" id="" class="form-control" required>
            <div class="valid-feedback">valid</div>
            <div class="invalid-feedback">please this field is required</div>
        </div>
        <div class="form-group">
            <label for="lastname">table :</label>
            <input type="text" name="table" id="" class="form-control" required>
            <div class="valid-feedback">valid</div>
            <div class="invalid-feedback">please this field is required</div>
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>

    <script>
        (function(){
            'use strict';
            window.addEventListener('load',function(){
                var forms = document.getElementsByClassName('needs-validation');
                var valdiation = Array.prototype.filter.call(forms, function(form){
                    form.addEventListener('submit', function(event){
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false)
                });
            }, false)
        })();
    </script>
    
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>