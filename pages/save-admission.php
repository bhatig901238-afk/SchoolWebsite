<?php

include("../config/config.php");

if(isset($_POST['student_name'])){

    $student_name = mysqli_real_escape_string($conn,$_POST['student_name']);
    $father_name = mysqli_real_escape_string($conn,$_POST['father_name']);
    $class = mysqli_real_escape_string($conn,$_POST['class']);
    $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);

    $sql = "INSERT INTO admissions
    (student_name,father_name,class,mobile,email,address)

    VALUES

    ('$student_name',
    '$father_name',
    '$class',
    '$mobile',
    '$email',
    '$address')";

    if(mysqli_query($conn,$sql)){

        echo "<script>

        alert('Admission Form Submitted Successfully');

        window.location='admission.php';

        </script>";

    }else{

        echo "Error : ".mysqli_error($conn);

    }

}else{

    header("Location: admission.php");

}

?>