<?php
session_start();
if (isset($_SESSION['login'])) {
  include "koneksi.php";

  $tahunajaran = $_POST['tahunajaran'];
  $kelas = $_POST['kelas'];
  $bulan = $_POST['bulan'];

  $sql = mysqli_query($konek, "SELECT * FROM spp RIGHT JOIN siswa ON spp.idsiswa=siswa.idsiswa WHERE siswa.tahunajaran='$tahunajaran' AND siswa.kelas='$kelas' AND spp.bulan LIKE '%$bulan%'");
?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Cetak Laporan Pembayaran</title>
    <style type="text/css">
      body {
        font-family: Arial;
      }

      @media print {
        .no-print {
          display: none;
        }
      }

      table {
        border-collapse: collapse;
      }

      th {
        padding: 15px 5px;
      }

      .text-center {
        text-align: center;
      }
    </style>
  </head>

  <body>
    <h3 class="text-center">DAFTAR PEMBAYARAN SPP SISWA SMK DEWI SARTIKA</h3>
    <h5>
      KELAS : <?= $kelas; ?> <br>
      BULAN : <?= $bulan; ?> <br>
    </h5>

    <table width="100%" border="1" cellspacing="0" cellpadding="4">
      <thead>
        <tr>
          <th style="width: 50px;">NO</th>
          <th>NAMA</th>
          <th style="width: 150px;">SPP</th>
          <th style="width: 150px;">BAYAR</th>
          <th style="width: 150px;">SALDO</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        $ttlLalu = 0;
        $ttlSpp = 0;
        $ttlJml = 0;
        $ttlByr = 0;
        $ttlSaldo = 0;
        while ($d = mysqli_fetch_array($sql)) {
          $spp = $d['jumlah'];

          $sqlBayar = mysqli_query($konek, "SELECT sum(jumlah_bayar) AS bayar FROM bayar WHERE idspp='$d[0]'");

          $fetchBayar = mysqli_fetch_array($sqlBayar);
          $bayar = $fetchBayar[0];
          if ($bayar > 0) {

            $saldo = $spp - $bayar;
        ?>

            <tr>
              <td align='center'><?= $no ?></td>
              <td><?= $d['namasiswa'] ?></td>
              <td align='right'><?= number_format($spp, 0, ',', '.'); ?></td>
              <td align='right'><?= number_format($bayar, 0, ',', '.'); ?></td>
              <td align='right'><?= number_format($saldo, 0, ',', '.'); ?></td>
            </tr>

        <?php
            $no++;
            $ttlSpp += $spp;
            $ttlByr += $bayar;
            $ttlSaldo += $saldo;
          }
        }
        ?>
      </tbody>

      <tfoot>
        <tr>
          <th colspan="2" align="right">TOTAL</th>
          <th align="right"><?= number_format($ttlSpp, 0, ',', '.'); ?></th>
          <th align="right"><?= number_format($ttlByr, 0, ',', '.'); ?></th>
          <th align="right"><?= number_format($ttlSaldo, 0, ',', '.'); ?></th>
        </tr>
      </tfoot>
    </table>

    <table width="100%">
      <tr>
        <td></td>
        <td width="200px">
          <p>Jakarta, <?= date('d/m/Y'); ?><br />
            Operator, </p>
          <br />
          <br />
          <p>______________________</p>
        </td>
      </tr>
    </table>
    <a href="#" class="no-print" onclick="window.print();">Cetak/Print</a>
    <!-- <a href="excel_laporan_pembayaran.php?tgl1=<?= $_GET['tgl1']; ?> &tgl2=<?= $_GET['tgl2']; ?>" class="no-print" target="_blank">Export ke Excel</a> -->
  </body>

  </html>

<?php
} else {
  header('location:login.php');
}
?>