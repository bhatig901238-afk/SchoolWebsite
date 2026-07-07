<?php

session_start();

include("../config/config.php");

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

/* Total Admissions */
$totalAdmissions = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM admissions")
);

/* Today's Admissions */
$todayAdmissions = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM admissions WHERE DATE(created_at)=CURDATE()")
);

/* Recent Admission */
$recent = mysqli_query($conn,"SELECT * FROM admissions ORDER BY id DESC LIMIT 1");
$recentStudent = mysqli_fetch_assoc($recent);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<link rel="stylesheet" href="../assets/css/admin.css">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<span class="navbar-brand">

School Admin Panel

</span>

<a href="logout.php" class="btn btn-danger">

Logout

</a>

</div>

</nav>

<div class="container py-5">

<h2 class="mb-4">

Dashboard

</h2>

<div class="row g-4">

<div class="col-lg-4">

<div class="dashboard-card bg-primary">

<i class="fa-solid fa-users"></i>

<h2>

<?php echo $totalAdmissions; ?>

</h2>

<p>

Total Admissions

</p>

</div>

</div>

<div class="col-lg-4">

<div class="dashboard-card bg-success">

<i class="fa-solid fa-calendar-day"></i>

<h2>

<?php echo $todayAdmissions; ?>

</h2>

<p>

Today's Admissions

</p>

</div>

</div>

<div class="col-lg-4">

<div class="dashboard-card bg-warning">

<i class="fa-solid fa-graduation-cap"></i>

<h2>

7

</h2>

<p>

Classes (6-12)

</p>

</div>

</div>

</div>

<div class="card mt-5 shadow">

<div class="card-header bg-dark text-white">

Recent Admission

</div>

<div class="card-body">

<?php

if($recentStudent){

?>

<h4>

<?php echo $recentStudent['student_name']; ?>

</h4>

<p>

Father :
<?php echo $recentStudent['father_name']; ?>

</p>

<p>

Class :
<?php echo $recentStudent['class']; ?>

</p>

<p>

Mobile :
<?php echo $recentStudent['mobile']; ?>

</p>

<?php

}else{

echo "No Admission Found.";

}

?>

</div>

</div>

<div class="mt-4">

<a href="admissions.php"
class="btn btn-primary">

Manage Admissions

</a>

</div>

</div>

</body>

</html>