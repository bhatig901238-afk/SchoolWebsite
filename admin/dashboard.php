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

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/admin.css">

</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark">

        <div class="container">

            <a class="navbar-brand" href="dashboard.php">

                School Admin Panel

            </a>

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

                <div class="dashboard-card bg-primary text-white text-center p-4 rounded shadow">

                    <i class="fa-solid fa-users fa-2x mb-3"></i>

                    <h2>
                        <?php echo $totalAdmissions; ?>
                    </h2>

                    <p class="mb-0">Total Admissions</p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="dashboard-card bg-success text-white text-center p-4 rounded shadow">

                    <i class="fa-solid fa-calendar-day fa-2x mb-3"></i>

                    <h2>
                        <?php echo $todayAdmissions; ?>
                    </h2>

                    <p class="mb-0">Today's Admissions</p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="dashboard-card bg-warning text-dark text-center p-4 rounded shadow">

                    <i class="fa-solid fa-graduation-cap fa-2x mb-3"></i>

                    <h2>7</h2>

                    <p class="mb-0">Classes (6-12)</p>

                </div>

            </div>

        </div>

        <!-- Recent Admission -->

        <div class="card shadow mt-5">

            <div class="card-header bg-primary text-white">

                <h5 class="mb-0">

                    <i class="fa-solid fa-user-graduate"></i>

                    Recent Admission

                </h5>

            </div>

            <div class="card-body">

                <?php if($recentStudent){ ?>

                <div class="row align-items-center">

                    <div class="col-md-3 text-center">

                        <?php if(!empty($recentStudent['photo'])){ ?>

                        <img src="../uploads/photos/<?php echo $recentStudent['photo']; ?>"
                            class="img-fluid rounded-circle border border-3 border-primary"
                            style="width:170px;height:170px;object-fit:cover;">

                        <?php }else{ ?>

                        <img src="https://via.placeholder.com/170" class="img-fluid rounded-circle">

                        <?php } ?>

                    </div>

                    <div class="col-md-9">

                        <table class="table table-bordered">

                            <tr>

                                <th width="30%">Student Name</th>

                                <td>
                                    <?php echo $recentStudent['student_name']; ?>
                                </td>

                            </tr>

                            <tr>

                                <th>Father Name</th>

                                <td>
                                    <?php echo $recentStudent['father_name']; ?>
                                </td>

                            </tr>

                            <tr>

                                <th>Class</th>

                                <td>
                                    <?php echo $recentStudent['class']; ?>
                                </td>

                            </tr>

                            <tr>

                                <th>Mobile</th>

                                <td>
                                    <?php echo $recentStudent['mobile']; ?>
                                </td>

                            </tr>

                            <tr>

                                <th>Email</th>

                                <td>
                                    <?php echo $recentStudent['email']; ?>
                                </td>

                            </tr>

                            <tr>

                                <th>Address</th>

                                <td>
                                    <?php echo $recentStudent['address']; ?>
                                </td>

                            </tr>

                        </table>

                        <a href="student-profile.php?id=<?php echo $recentStudent['id']; ?>" class="btn btn-info">

                            <i class="fa-solid fa-eye"></i>

                            View Profile

                        </a>

                    </div>

                </div>

                <?php } else { ?>

                <div class="alert alert-warning mb-0">

                    No Admission Found.

                </div>

                <?php } ?>

            </div>

        </div>

        <div class="mt-4">

            <a href="admissions.php" class="btn btn-primary">

                <i class="fa-solid fa-list"></i>

                Manage Admissions

            </a>

        </div>

    </div>

</body>

</html>