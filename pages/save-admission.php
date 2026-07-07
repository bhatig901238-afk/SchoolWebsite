<?php

include("../config/config.php");

if(isset($_POST['student_name'])){

    $student_name = mysqli_real_escape_string($conn,$_POST['student_name']);
    $father_name = mysqli_real_escape_string($conn,$_POST['father_name']);
    $class = mysqli_real_escape_string($conn,$_POST['class']);
    $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    $photo=$_FILES['photo']['name'];
    $tmp=$_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp,"../uploads/photos/".$photo);
    $document=$_FILES['document']['name'];
    $tmp2=$_FILES['document']['tmp_name'];
    move_uploaded_file($tmp2,"../uploads/documents/".$document);

    $sql = "INSERT INTO admissions
    (student_name,father_name,class,mobile,email,address,photo,document)
    VALUES(
    '$student_name',
    '$father_name',
    '$class',
    '$mobile',
    '$email',
    '$address',
    '$photo',
    '$document'
    )";

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