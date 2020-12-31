<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['login'])) {
  $today = date('Y-m-d');

  if ($_GET['act'] === "in") {
    $id = $_POST['idsiswa'];
    $nominal = $_POST['tabung'];

    $current = $konek->query("SELECT saldo FROM tabungan WHERE idsiswa=$id ORDER BY idtabungan DESC LIMIT 1")->fetch_assoc();

    if (!empty($current['saldo'])) {
      $lastSaldo = intval($current['saldo']);
      $lastSaldo = $lastSaldo + $nominal;
    } else {
      $lastSaldo = $nominal;
    }

    $process = $konek->query("INSERT tabungan VALUES (NULL, '$id', '0', '$nominal', '$lastSaldo', '$today')");
    if ($process) {
      $_SESSION['temp_alert'] = array(
        "stats" => "success",
        "msg" => "Berhasil Menambahkan Tabungan Siswa",
      );
      header('Location: tabungan.php');
    } else {
      $_SESSION['temp_alert'] = array(
        "stats" => "fail",
        "msg" => "Theres Some Mistake From Database :(",
      );
      header('Location: tabungan.php');
    }
  } else if ($_GET['act'] === "get_saldo") {

    $id = $_GET['id'];
    $data = [];
    $getTransaction = $konek->query("SELECT * FROM tabungan WHERE idsiswa=$id ORDER BY tgltabungan DESC")->fetch_all();
    $getSaldo = $konek->query("SELECT saldo FROM tabungan WHERE idsiswa=$id ORDER BY idtabungan DESC LIMIT 1")->fetch_assoc();

    if ($getTransaction) {
      for ($i = 0; $i < count($getTransaction); $i++) {
        if ($getTransaction[$i][3] !== '0') {
          $data['kredit'][] = array(
            'nominal' => $getTransaction[$i][3],
            'tgl' => $getTransaction[$i][5],
          );
        } else {
          $data['debit'][] = array(
            'nominal' => $getTransaction[$i][2],
            'tgl' => $getTransaction[$i][5],
          );
        }
      }

      $data['saldo'] = $getSaldo['saldo'];
    } else {

      $data = null;
    }

    echo json_encode($data);
  } else {
    $id = $_POST['idsiswa'];
    $out = $_POST['tarik'];
    $saldo = $_POST['currentSaldo'];
    $lastSaldo = intval($saldo) - intval($out);

    $process = $konek->query("INSERT tabungan VALUES (NULL, '$id', '$out', '0', '$lastSaldo', '$today')");
    if ($process) {
      $_SESSION['temp_alert'] = array(
        "stats" => "success",
        "msg" => "Tabungan Diambil Sejumlah Rp. " . $out . "\\n Sisa Saldo Saat Ini: Rp. $lastSaldo",
      );
      header('Location: tabungan.php');
    } else {
      $_SESSION['temp_alert'] = array(
        "stats" => "fail",
        "msg" => "Theres Some Mistake From Database :(",
      );
      header('Location: tabungan.php');
    }
  }
}
