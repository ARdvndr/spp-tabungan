<?php
session_start();
if (isset($_SESSION['login'])) {
  include "koneksi.php";
  $nis = $_POST['nis'];

  $q = mysqli_query($konek, "SELECT * FROM siswa WHERE nis='$nis'");
  $row = mysqli_fetch_array($q);
  $sql = mysqli_query($konek, "SELECT * FROM tabungan LEFT JOIN siswa ON tabungan.idsiswa=siswa.idsiswa WHERE siswa.nis='$nis'");
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
    <h3 class="text-center">DAFTAR TABUNGAN</h3>
    <h5>
      NAMA : <?= $row['namasiswa']; ?> <br>
      KELAS : <?= $row['kelas']; ?> <br>
    </h5>

    <table width="100%" border="1" cellspacing="0" cellpadding="4">
      <thead>
        <tr>
          <th style="width: 50px;">NO</th>
          <th style="width: 100px;">TGL</th>
          <th style="width: 150px;">DEBIT</th>
          <th style="width: 150px;">KREDIT</th>
          <th style="width: 150px;">SALDO</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        $ttlDebit = 0;
        $ttlKredit = 0;
        $ttlSaldo = 0;
        while ($d = mysqli_fetch_array($sql)) {
        ?>
          <tr>
            <td align='center'><?= $no++ ?></td>
            <td><?= $d['tgltabungan'] ?></td>
            <td align='right'><?= number_format($d['kredit'], 0, ',', '.'); ?></td>
            <td align='right'><?= number_format($d['debit'], 0, ',', '.'); ?></td>
            <td align='right'><?= number_format($d['saldo'], 0, ',', '.'); ?></td>
          </tr>

        <?php
          $ttlDebit += $d['debit'];
          $ttlKredit += $d['kredit'];
        }
        $ttlSaldo = $ttlKredit - $ttlDebit;
        ?>
      </tbody>

      <tfoot>
        <tr>
          <th colspan="2" align="right">TOTAL</th>
          <th align="right"><?= number_format($ttlKredit, 0, ',', '.'); ?></th>
          <th align="right"><?= number_format($ttlDebit, 0, ',', '.'); ?></th>
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