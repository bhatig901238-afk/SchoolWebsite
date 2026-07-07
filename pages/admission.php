<?php
include("../config/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Online Admission | Shree Ram Inter College</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/css/style.css">

  <link rel="stylesheet" href="../assets/css/navbar.css">

  <link rel="stylesheet" href="../assets/css/admission.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

  <div class="container py-5">

    <div class="row justify-content-center">

      <div class="col-lg-8">

        <div class="admission-card">

          <div class="text-center mb-4">

            <h2>Online Admission Form</h2>

            <p>Shree Ram Inter College</p>

          </div>

          <form action="save-admission.php" method="POST" enctype="multipart/form-data">

            <div class="row">

              <div class="col-md-6 mb-3">

                <label>Student Name</label>

                <input type="text" name="student_name" class="form-control" required>

              </div>
              <div class="col-md-6 mb-3">

                <label>

                  Student Photo

                </label>

                <input type="file" name="photo" class="form-control" required>

              </div>
              <div class="col-md-6 mb-3">

                <label>

                  Transfer Certificate / Aadhaar

                </label>

                <input type="file" name="document" class="form-control" required>

              </div>

              <div class="col-md-6 mb-3">

                <label>Father Name</label>

                <input type="text" name="father_name" class="form-control" required>

              </div>

              <div class="col-md-6 mb-3">

                <label>Class</label>

                <select name="class" class="form-select" required>

                  <option value="">Select Class</option>

                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                  <option>10</option>
                  <option>11</option>
                  <option>12</option>

                </select>

              </div>

              <div class="col-md-6 mb-3">

                <label>Mobile</label>

                <input type="text" name="mobile" class="form-control" required>

              </div>

              <div class="col-12 mb-3">

                <label>Email</label>

                <input type="email" name="email" class="form-control">

              </div>

              <div class="col-12 mb-3">

                <label>Address</label>

                <textarea name="address" class="form-control" rows="4"></textarea>

              </div>

              <div class="col-12">

                <button class="btn btn-primary w-100">

                  Submit Admission

                </button>

              </div>

            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

</body>

</html>