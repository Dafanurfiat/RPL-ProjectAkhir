<?php
include '../../config.php';
require "functions.php";
session_start();

 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}

$reqtransaksi = read_data("SELECT * 
            FROM transaksi 
            WHERE
            statusReq=1 AND 
            status=1");
$riwayattransaksi = read_data("SELECT *
                 FROM transaksi
                 WHERE
                 statusReq=1 AND
                 status IN (2,3)");
$statusReq = ["0"=>"Pending", "1"=>"Accept", "2"=>"Decline"];
$status = ["0"=>"Unapprove", "1"=>"Pending", "2"=>"OnProgress", "3"=>"Done", "4"=>"Decline"];
$statusclass = ["0"=>"badge badge-grey", 
                "1"=>"badge badge-grey", 
                "2"=>"badge badge-warning", 
                "3"=>"badge badge-success", 
                "4"=>"badge badge-danger"];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tenda Biru</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/TendaBiru.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="dashboardpemasok.php" style="color: #659DBD;"><h1>Tenda Biru</h1></a>
          <a class="sidebar-brand brand-logo-mini" href="dashboardpemasok.php"><img src="../../assets/images/TendaBiru.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="../../assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['username']; ?></h5>
                  <span>Pemasok</span>
                </div>
              </div>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="dashboardpemasok.php">
              <span class="menu-icon">
                <i class="mdi mdi-home-variant"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="stockpemasok.php">
              <span class="menu-icon">
                <i class="mdi mdi-package-variant-closed"></i>
              </span>
              <span class="menu-title">Stock</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="transactionpemasok.php">
              <span class="menu-icon">
                <i class="mdi mdi-file-plus"></i>
              </span>
              <span class="menu-title">Transaction</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="deliverypemasok.php">
              <span class="menu-icon">
                <i class="mdi mdi-truck"></i>
              </span>
              <span class="menu-title">Delivery</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="dashboardpemasok.php"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Event today</p>
                      <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                      <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-link-variant text-warning"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Launch Admin</p>
                      <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../../assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['username']; ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <a href="..\..\login.php" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Transaction </h3>
            </div>
            <div class="row">
              <div class="col-lg-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">


                    <h4 class="card-title">Transaction</h4>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> No </th>
                            <th> Date </th>
                            <th> Transaction Details </th>
                            <th> Total Price </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1 ?>
                          <?php foreach ($reqtransaksi as $trs) : ?>
                          <tr>
                            <td>
                              <?= $no ?>
                            </td>
                            <td>
                              <?= $trs["tanggalTransaksi"] ?>
                            </td>
                            <td> 
                              <a class="nav-link" href="transactiondetail.php?id=<?= $trs["idTransaksi"]?>">
                                <button type="button" class="btn btn-outline-primary btn-icon-text"> Detail </button>  
                              </a>
                            </td>
                            <td>
                              <?= $trs["totalHarga"]; ?>
                            </td>
                            <td>
                              <div class="d-grid gap-2 d-md-flex justify-content-md-start" >
                                <a href="approve.php?id=<?= $trs["idTransaksi"]?>">
                                  <button type="button" class="btn btn-outline-success btn-icon-text">
                                    <i class="mdi mdi-checkbox-marked"></i>Accept
                                  </button> 
                                </a>
                                <a href="decline.php?id=<?= $trs["idTransaksi"]?>">
                                  <button type="button" class="btn btn-outline-danger btn-icon-text">
                                    <i class="mdi mdi-close-box"></i>Decline
                                  </button>  
                                </a>
                              </div>
                            </td>
                          </tr>
                          <?php $no++ ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>



                  </div>
                </div>
              </div>
              <div class="col-lg-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Transaction History</h4>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> No </th>
                            <th> Date </th>
                            <th> Transaction details </th>
                            <th> Total Price </th>
                            <th> Status </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1 ?>
                          <?php foreach ($riwayattransaksi as $trs) : ?>
                          <tr>
                            <td>
                              <?= $no ?>
                            </td>
                            <td>
                              <?= $trs["tanggalTransaksi"] ?>
                            </td>
                            <td>
                              <a class="nav-link" href="transactiondetail.php?id=<?= $trs["idTransaksi"]?>">
                                <button type="button" class="btn btn-outline-primary btn-icon-text"> Detail </button>  
                              </a> 
                            </td>
                            <td>
                              <?= $trs["totalHarga"]; ?>
                                
                            </td>
                            <td>
                              <label class="<?= $statusclass[$trs['status']] ?>"><?= $status[$trs["status"]] ?></label>
                            </td>
                          </tr>
                          <?php $no++ ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>