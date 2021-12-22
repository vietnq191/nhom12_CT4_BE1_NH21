<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/user.php";
require "models/protype.php";
require "models/orders.php";
$protype = new Protype();
$user = new User();
$product = new Product();
$manufacture = new Manufacture();
$orders = new Orders();
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION["AdminUsername"])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <?php if (isset($_SESSION["AdminName"])) : ?>
             <a href="form_changePass.php"> <span class="d-block" style="color: white;"><?php echo $_SESSION["AdminName"] ?></span></a>
            <?php endif ?>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <!-- Get last url -->
            <?php
            $link = $_SERVER['PHP_SELF'];
            $link_array = explode('/', $link);
            $nameURL = end($link_array);
            ?>
            <!-- Get last url -->
            <?php
            $checkDashboard = false;
            if ($nameURL == "index.php" || $nameURL == "orders_new.php" || $nameURL == "statistic_chart_order.php" || $nameURL == "statistic_accounts.php" || $nameURL == "statistic_products.php" || $nameURL == "statistic_chart_products.php") {
              $checkDashboard = true;
            }
            ?>
            <li class="nav-item <?php if ($checkDashboard == true) echo "menu-open" ?>">
              <a href="index.php" class="nav-link <?php if ($checkDashboard == true) echo "active" ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right"></i>
                </p>
              </a>
            </li>
            <!-- Products-->
            <?php
            $checkProducts = false;
            if ($nameURL == "products.php" || $nameURL == "addproduct.php" || $nameURL == "edit-product.php") {
              $checkProducts = true;
            } ?>
            <li class="nav-item <?php if ($checkProducts == true) echo "menu-open" ?>">
              <a href="#" class="nav-link <?php if ($checkProducts == true) echo "active" ?>">
                <i class="nav-icon fas fa-shopping-bag"></i>
                <p>
                  Products
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="products.php" class="nav-link <?php if ($nameURL == "products.php") echo "active" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Products</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="addproduct.php" class="nav-link <?php if ($nameURL == "addproduct.php") echo "active" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Product</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="edit-product.php" class="nav-link <?php if ($nameURL == "edit-product.php") echo "active" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit Product</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Products-->

            <!-- Menufactures -->
            <?php
            $checkMenufactures = false;
            if ($nameURL == "manufactures.php" || $nameURL == "add-manufacture.php" || $nameURL == "edit-manufacture.php") {
              $checkMenufactures = true;
            } ?>
            <li class="nav-item <?php if ($checkMenufactures == true) echo "menu-open" ?>">
              <a href="#" class="nav-link <?php if ($checkMenufactures == true) echo "active" ?>">
                <i class="nav-icon fas fa-city"></i>
                <p>
                  Manufactures
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="manufactures.php" class="nav-link <?php if ($nameURL == "manufactures.php") echo "active" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Manufactures</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="add-manufacture.php" class="nav-link <?php if ($nameURL == "add-manufacture.php") echo "active" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Manufacture</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="edit-manufacture.php" class="nav-link <?php if ($nameURL == "edit-manufacture.php") echo "active" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit Manufacture</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Menufactures -->

            <!-- Protypes -->
            <?php
            $checkProtypes = false;
            if ($nameURL == "protypes.php" || $nameURL == "form_add_protype.php" || $nameURL == "form_edit_protype.php") {
              $checkProtypes = true;
            } ?>
            <li class="nav-item <?php if ($checkProtypes == true) echo "menu-open" ?>">
              <a href="#" class="nav-link <?php if ($checkProtypes == true) echo "active" ?>">
                <i class="nav-icon fas fa-box"></i>
                <p>
                  Protypes
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="protypes.php" class="nav-link <?php if ($nameURL == "protypes.php") echo "active" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Protypes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="form_add_protype.php" class="nav-link <?php if ($nameURL == "form_add_protype.php") echo "active" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Protype</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="form_edit_protype.php" class="nav-link <?php if ($nameURL == "form_edit_protype.php") echo "active" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit Protype</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Protypes -->

            <!-- Users -->
            <?php
            $checkUsers = false;
            if ($nameURL == "user.php" || $nameURL == "form_add_user.php" || $nameURL == "form_edit_user.php") {
              $checkUsers = true;
            } ?>
            <li class="nav-item <?php if ($checkUsers == true) echo "menu-open" ?>">
              <a href="#" class="nav-link <?php if ($checkUsers == true) echo "active" ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Users
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="user.php" class="nav-link <?php if ($nameURL == "user.php") echo "active" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Users</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="form_add_user.php" class="nav-link <?php if ($nameURL == "form_add_user.php") echo "active" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="form_edit_user.php" class="nav-link <?php if ($nameURL == "form_edit_user.php") echo "active" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit User</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Users -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>