<?php

session_start();

if(!isset($_SESSION['admin'])){

header("Location: login.php");
exit();

}

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<span class="navbar-brand">

School Admin Panel

</span>

<a href="logout.php"
class="btn btn-danger">

Logout

</a>

</div>

</nav>

<div class="container py-5">

<h2>

Welcome Admin 👋

</h2>

<p>

Admin Dashboard Successfully Created.

</p>

<a
href="admissions.php"
class="btn btn-primary">

View Admissions

</a>

</div>

</body>

</html>