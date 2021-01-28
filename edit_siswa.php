<?php include "header.php"; ?>

<?php
$sqlEdit = mysqli_query($konek, "SELECT * FROM siswa WHERE idsiswa='$_GET[id]'");
$e = mysqli_fetch_array($sqlEdit);
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Data Siswa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="tampil_Siswa.php">Siswa</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <form method="post" action="">
          <input type="hidden" name='idsiswa' value="<?php echo $e['idsiswa']; ?>" />
          <table class="table">
            <tr>
              <td width="160px">NIS</td>
              <td><input class="form-control" type="text" name="nis" value="<?php echo $e['nis']; ?>" maxlength="10" required></td>
            </tr>
            <tr>
              <td>Nama Siswa</td>
              <td><input class="form-control" type="text" name="namasiswa" value="<?php echo $e['namasiswa']; ?>" maxlength="40" required></td>
            </tr>
            <tr>
              <td>Kelas</td>
              <td>
                <select class="form-control" name="kelas" required>
                  <?php
                  $sqlKelas = mysqli_query($konek, "select * from walikelas order by kelas ASC");
                  while ($k = mysqli_fetch_array($sqlKelas)) {

                    if ($k['kelas'] == $e['kelas']) {
                      $selected = "selected";
                    } else {
                      $selected = "";
                    }

                  ?>
                    <option value="<?php echo $k['kelas']; ?>" <?php echo $selected; ?>><?php echo $k['kelas']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Tahun Ajaran</td>
              <td>
                <select name="tahunajaran" class="form-control" required>
                  <option value="" selected>- Pilih Tahun Ajaran -</option>
                  <?php
                  $sqlTajar = mysqli_query($konek, "select * from tajar order by tahunajaran ASC");
                  while ($t = mysqli_fetch_array($sqlTajar)) {
                  ?>
                    <option value="<?php echo $t['idtahunajaran']; ?>" <?php if ($t['idtahunajaran'] == $e['tahunajaran']) echo "selected"; ?>>
                      <?php echo $t['tahunajaran']; ?>
                    </option>
                  <?php
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Biaya SPP</td>
              <td><input class="form-control" type="text" name="biaya" value="<?php echo $e['biaya']; ?>" readonly /></td>
            </tr>
            <tr>
              <td>Jatuh Tempo Pertama</td>
              <td><input class="form-control" type="text" name="jatuhtempo" value="2017-07-10" readonly /></td>
            </tr>
            <tr>
              <td></td>
              <td><input class="btn btn-success" type="submit" value="Update" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</section>


<!-- proses edit data -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //variabel untuk menampung inputan dari form
  $id   = $_POST['idsiswa'];
  $nis   = $_POST['nis'];
  $nama   = $_POST['namasiswa'];
  $kelas   = $_POST['kelas'];
  $tahun   = $_POST['tahunajaran'];
  $biaya   = $_POST['biaya'];

  if ($nis == '' || $nama == '' || $kelas == '') {
    echo "Form Belum lengkap....";
  } else {
    $update = mysqli_query($konek, "UPDATE siswa SET nis='$nis',
											namasiswa='$nama',
											kelas='$kelas',
											tahunajaran='$tahun',
											biaya='$biaya'
										WHERE idsiswa='$id'");

    if (!$update) {
      echo "Update data gagal...";
    } else {
      echo "<script>window.location.href='tampil_siswa.php';</script>";
    }
  }
}
?>

<?php include "footer.php" ?>