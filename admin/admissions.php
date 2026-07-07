<?php

session_start();

include("../config/config.php");

if(!isset($_SESSION['admin'])){

header("Location:login.php");

exit();

}

$where="";

if(isset($_GET['search'])){

$search=mysqli_real_escape_string($conn,$_GET['search']);

$where.=" WHERE student_name LIKE '%$search%'";

}

if(isset($_GET['class']) && $_GET['class']!=""){

$class=mysqli_real_escape_string($conn,$_GET['class']);

if($where==""){

$where.=" WHERE class='$class'";

}else{

$where.=" AND class='$class'";

}

}

$sql="SELECT * FROM admissions

$where

ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

$total=mysqli_num_rows($result);

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>All Admissions</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<a href="dashboard.php" class="navbar-brand">

School Admin

</a>

<a href="logout.php" class="btn btn-danger">

Logout

</a>

</div>

</nav>

<div class="container py-5">

<h2 class="mb-4">

All Admissions

</h2>

<div class="alert alert-success">

Total Records :

<strong>

<?php echo $total; ?>

</strong>

</div>

<form method="GET" class="row mb-4">

<div class="col-md-5">

<input
type="text"
name="search"
class="form-control"
placeholder="Search Student Name"

value="<?php echo isset($_GET['search'])?$_GET['search']:''; ?>">

</div>

<div class="col-md-3">

<select name="class" class="form-select">

<option value="">

All Classes

</option>

<option value="6">6</option>

<option value="7">7</option>

<option value="8">8</option>

<option value="9">9</option>

<option value="10">10</option>

<option value="11">11</option>

<option value="12">12</option>

</select>

</div>

<div class="col-md-2">

<button class="btn btn-primary w-100">

Search

</button>

</div>

<div class="col-md-2">

<a href="admissions.php"

class="btn btn-secondary w-100">

Reset

</a>

</div>

</form>

<div class="table-responsive">

<table class="table table-bordered table-hover">

<thead class="table-primary">

<tr>

<th>ID</th>

<th>Student</th>

<th>Father</th>

<th>Class</th>

<th>Mobile</th>

<th>Email</th>

<th>Date</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['student_name']; ?></td>

<td><?php echo $row['father_name']; ?></td>

<td><?php echo $row['class']; ?></td>

<td><?php echo $row['mobile']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['created_at']; ?></td>

<td>

<a href="delete-admission.php?id=<?php echo $row['id']; ?>"

class="btn btn-danger btn-sm"

onclick="return confirm('Delete this record?')">

Delete

</a>

<a href="edit-admission.php?id=<?php echo $row['id']; ?>"

class="btn btn-warning btn-sm">

Edit

</a>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

</body>

</html>