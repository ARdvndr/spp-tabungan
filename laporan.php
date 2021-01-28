<?php
include "header.php";

$optBln = array(
  1 => 'Januari',
  2 => 'Februari',
  3 => 'Maret',
  4 => 'April',
  5 => 'Mei',
  6 => 'Juni',
  7 => 'Juli',
  8 => 'Agustus',
  9 => 'September',
  10 => 'Oktober',
  11 => 'November',
  12 => 'Desember',
);
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Laporan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Laporan</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-4">
        <table class="table">
          <tr>
            <td>Laporan Tunggakan</td>
            <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalLapTunggakan">Pilih</button></td>
          </tr>
          <tr>
            <td>Laporan Pembayaran</td>
            <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalLapBayar">Pilih</button></td>
          </tr>
          <tr>
            <td>Laporan Tabungan</td>
            <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalLapTabungan">Pilih</button></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<form action="laporan_tunggakan.php" method="post" target="_blank">
  <div class="modal fade" id="modalLapTunggakan" tabindex="-1" aria-labelledby="modalLapTunggakanLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLapTunggakanLabel">Laporan Tunggakan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <select class="form-select mb-2" name="tahunajaran">
            <option selected>--- Pilih Tahun Ajaran ---</option>
            <?php
            $sql = mysqli_query($konek, "SELECT * FROM tajar ORDER BY idtahunajaran ASC");
            while ($t = mysqli_fetch_array($sql)) {
              echo "<option value='$t[idtahunajaran]'>$t[tahunajaran]</option>";
            }
            ?>
          </select>

          <select class="form-select mb-2" name="kelas">
            <option selected>--- Pilih Kelas ---</option>
            <?php
            $sql = mysqli_query($konek, "SELECT * FROM walikelas ORDER BY kelas ASC");
            while ($t = mysqli_fetch_array($sql)) {
              echo "<option value='$t[kelas]'>$t[kelas]</option>";
            }
            ?>
          </select>

          <select class="form-select mb-2" name="bulan">
            <option selected>--- Pilih Bulan ---</option>
            <?php
            foreach ($optBln as $key => $value) {
              echo "<option value='$value'>$value</option>";
            }
            ?>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Print</button>
        </div>
      </div>
    </div>
  </div>
</form>

<form action="laporan_pembayaran.php" method="post" target="_blank">
  <div class="modal fade" id="modalLapBayar" tabindex="-1" aria-labelledby="modalLapBayarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLapBayarLabel">Laporan Pembayaran</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <select class="form-select mb-2" name="tahunajaran">
            <option selected>--- Pilih Tahun Ajaran ---</option>
            <?php
            $sql = mysqli_query($konek, "SELECT * FROM tajar ORDER BY idtahunajaran ASC");
            while ($t = mysqli_fetch_array($sql)) {
              echo "<option value='$t[idtahunajaran]'>$t[tahunajaran]</option>";
            }
            ?>
          </select>

          <select class="form-select mb-2" name="kelas">
            <option selected>--- Pilih Kelas ---</option>
            <?php
            $sql = mysqli_query($konek, "SELECT * FROM walikelas ORDER BY kelas ASC");
            while ($t = mysqli_fetch_array($sql)) {
              echo "<option value='$t[kelas]'>$t[kelas]</option>";
            }
            ?>
          </select>

          <select class="form-select mb-2" name="bulan">
            <option selected>--- Pilih Bulan ---</option>
            <?php
            foreach ($optBln as $key => $value) {
              echo "<option value='$value'>$value</option>";
            }
            ?>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Print</button>
        </div>
      </div>
    </div>
  </div>
</form>

<form action="laporan_tabungan.php" method="post" target="_blank">
  <div class="modal fade" id="modalLapTabungan" tabindex="-1" aria-labelledby="modalLapTabunganLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLapTabunganLabel">Laporan Tabungan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <select class="form-select mb-2" name="tahunajaran">
            <option selected>--- Pilih Tahun Ajaran ---</option>
            <?php
            $sql = mysqli_query($konek, "SELECT * FROM tajar ORDER BY idtahunajaran ASC");
            while ($t = mysqli_fetch_array($sql)) {
              echo "<option value='$t[idtahunajaran]'>$t[tahunajaran]</option>";
            }
            ?>
          </select>

          <select class="form-select mb-2" name="bulan">
            <option selected>--- Pilih Bulan ---</option>
            <?php
            foreach ($optBln as $key => $value) {
              echo "<option value='$key'>$value</option>";
            }
            ?>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Print</button>
        </div>
      </div>
    </div>
  </div>
</form>

<?php include "footer.php"; ?>