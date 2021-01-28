<?php
session_start();
if (isset($_SESSION['login'])) {
  include "koneksi.php";
  if (isset($_GET['id']) && $_GET['id'] != "") {
    $nobayar = $_GET['id'];
    $q = mysqli_query($konek, "SELECT * FROM bayar WHERE nobayar='$nobayar'");
    $row = mysqli_fetch_array($q);
  }
}
var_dump($row);
