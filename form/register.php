<?php
    include "db.php";

    $fullname = $_POST['fullname'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $adress = $_POST['adress'];
    $password = $_POST['password'];

    $sql = "INSERT INTO students (fullname,student_id,email,phone,dob,gender,department,semester,adress,password)
    VALUES (
        '$fullname',
        '$student_id',
        '$email',
        '$phone',
        '$dob',
        '$gender',
        '$department',
        '$semester',
        '$adress',
        '$password')";


    if ($db -> query($sql)) {
        echo "<h2>Student Registered Successfully</h2><br>";
        } else {
        echo "Connection Failed: ".mysqli_connect_error();
    }
?>