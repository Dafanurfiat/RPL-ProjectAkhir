<?php
require 'config.php';
session_start();
 

 
if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256

  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['username'];

      // Mendapatkan role dari hasil query
      $roles = $row['roles'];

      // Memeriksa nilai role dan melakukan redirect sesuai kebutuhan
      if ($roles == 'manager') {
          header("Location: pages/manager/dashboard.php");
          exit();
      } elseif ($roles == 'staff') {
          header("Location: index copy.html");
          exit();
      } elseif ($roles == 'koki') {
          header("Location: pages/koki/dashboardkoki.php");
      } elseif ($roles == 'pemasok'){
          header("Location: pages/pemasok/dashboardpemasok.php");
      } else {
          echo "PEMAI deng ngana";
      }
  } else {
      echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tenda Biru</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/TendaBiru.png" />
    <style>
        .enter-btn {
            width: 200px; /* Adjust the width to your preference */
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth register-half-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action="" method="POST">
                  <div class="form-group">
                    <label>Username or email *</label>
                    <input type="email" name="email" style="color:white;" class="form-control p_input" placeholder="Enter your username">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="password" style="color:white;" class="form-control p_input" placeholder="Enter your password">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-outline-primary btn-block enter-btn">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>