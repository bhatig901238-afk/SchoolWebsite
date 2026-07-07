<?php

session_start();

include("../config/config.php");

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM admissions WHERE id='$id'");

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Edit Admission</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

<div class="col-lg-8 mx-auto">

<div class="card shadow">

<div class="card-body">

<h2 class="mb-4">

Edit Admission

</h2>

<form action="update-admission.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<div class="mb-3">

<label>Student Name</label>

<input
type="text"
name="student_name"
class="form-control"
value="<?php echo $row['student_name']; ?>"
required>

</div>

<div class="mb-3">

<label>Father Name</label>

<input
type="text"
name="father_name"
class="form-control"
value="<?php echo $row['father_name']; ?>"
required>

</div>

<div class="mb-3">

<label>Class</label>

<input
type="text"
name="class"
class="form-control"
value="<?php echo $row['class']; ?>"
required>

</div>

<div class="mb-3">

<label>Mobile</label>

<input
type="text"
name="mobile"
class="form-control"
value="<?php echo $row['mobile']; ?>"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?php echo $row['email']; ?>">

</div>

<div class="mb-3">

<label>Address</label>

<textarea
name="address"
class="form-control"
rows="4"><?php echo $row['address']; ?></textarea>

</div>

<button class="btn btn-success">

Update Admission

</button>

<a href="admissions.php" class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

</div>

</body>

</html>