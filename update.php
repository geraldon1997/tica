<?php

require 'master.php';
$student = new Student();
$regno = $_GET['regno'];

$result = $student->getData("SELECT * FROM students WHERE reg='$regno' ");

foreach ($result as $key => $st) {
    $lname = $st['lname'];
    $fname = $st['fname'];
    $oname = $st['oname'];
    $class = $st['class'];
    $table = $st['tbl'];
}

?>
<form action="" id="student" method="post">
        update student
        <input type="hidden" name="reg" value="<?php echo $regno; ?>">
        <input title="last name" type="text" name="ln" id="" value="<?php echo $lname ;?>" placeholder="last name">
        <input title="first name" type="text" name="fn" id="" value="<?php echo $fname ;?>" placeholder="first name">
        <input title="other name" type="text" name="on" id="" value="<?php echo $oname ;?>" placeholder="other name">
        <input title="class" type="text" name="cl" id="" value="<?php echo $class ;?>" placeholder="student class">
        <input title="table" type="text" name="tbl" id="" value="<?php echo $table ;?>" placeholder="table name">
        <input title="update" type="submit" value="update student" name="updatestudent">
    </form>