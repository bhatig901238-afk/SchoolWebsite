<?php

session_start();

include("../config/config.php");

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

$id=$_POST['id'];

$student_name=mysqli_real_escape_string($conn,$_POST['student_name']);
$father_name=mysqli_real_escape_string($conn,$_POST['father_name']);
$class=mysqli_real_escape_string($conn,$_POST['class']);
$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$address=mysqli_real_escape_string($conn,$_POST['address']);

$sql="UPDATE admissions SET

student_name='$student_name',
father_name='$father_name',
class='$class',
mobile='$mobile',
email='$email',
address='$address'

WHERE id='$id'";

mysqli_query($conn,$sql);

header("Location: admissions.php");

?>