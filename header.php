<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('location:login.php');
}

include "koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link rel="icon" href="../assets/favicon.pnt"> -->

  <title>Aplikasi Pembayaran SPP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/css/fontawesome.min.css">
  <link rel="stylesheet" href="assets/css/solid.min.css">

  <!-- JavaScript -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/swal.min.js"></script>
  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/dataTables.rowsGroup.js"></script>
  <script src="assets/js/dataTables.bootstrap5.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/adminlte.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
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
        <li class="nav-item">
          <a href="logout.php" class="nav-link">Logout</a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <a href="#" class="brand-link">
        <img src="./assets/img/desalogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SPP DESA</span>
      </a>

      <div class="sidebar">

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="far fas fa-home nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-database"></i>
                <p>
                  Master Data
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="tampil_walikelas.php" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Data Wali Kelas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tampil_siswa.php" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Data Siswa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tampil_tahunajaran.php" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Tahun Ajaran</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Transaksi
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="transaksi.php" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Pembayaran SPP</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tabungan.php" class="nav-link">
                    <i class="far fas fa-book nav-icon"></i>
                    <p>Tabungan</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="laporan.php" class="nav-link">
                <i class="far fas fa-chart-bar nav-icon"></i>
                <p>Laporan</p>
              </a>
            </li>

          </ul>
        </nav>

      </div>

    </aside>
  </div>

  <div class="content-wrapper">