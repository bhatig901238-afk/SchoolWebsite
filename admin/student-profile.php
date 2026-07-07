<?php

session_start();
include("../config/config.php");

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

$id = intval($_GET['id']);

$result = mysqli_query($conn,"SELECT * FROM admissions WHERE id=$id");

if(mysqli_num_rows($result)==0){
    die("Student Not Found");
}

$row = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Student Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-light">

<div class="container py-5">

<div class="card shadow-lg">

<div class="card-header bg-primary text-white">

<h3>Student Profile</h3>

</div>

<div class="card-body">

<div class="row">

<div class="col-md-4 text-center">

<img

src="../uploads/photos/<?php echo $row['photo']; ?>"

class="img-fluid rounded-circle border"

style="width:220px;height:220px;object-fit:cover;">

</div>

<div class="col-md-8">

<table class="table table-bordered">

<tr>

<th width="35%">Student Name</th>

<td><?php echo $row['student_name']; ?></td>

</tr>

<tr>

<th>Father Name</th>

<td><?php echo $row['father_name']; ?></td>

</tr>

<tr>

<th>Class</th>

<td><?php echo $row['class']; ?></td>

</tr>

<tr>

<th>Mobile</th>

<td><?php echo $row['mobile']; ?></td>

</tr>

<tr>

<th>Email</th>

<td><?php echo $row['email']; ?></td>

</tr>

<tr>

<th>Address</th>

<td><?php echo $row['address']; ?></td>

</tr>

<tr>

<th>Admission Date</th>

<td><?php echo $row['created_at']; ?></td>

</tr>

</table>

<a

href="../uploads/documents/<?php echo $row['document']; ?>"

target="_blank"

class="btn btn-success">

<i class="fa-solid fa-download"></i>

Download Document

</a>

<button

onclick="window.print()"

class="btn btn-primary">

<i class="fa-solid fa-print"></i>

Print

</button>

<a

href="admissions.php"

class="btn btn-secondary">

Back

</a>

</div>

</div>

</div>

</div>

</div>

</body>

</html>