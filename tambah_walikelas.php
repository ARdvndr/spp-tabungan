<?php include "header.php"; ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Data Kelas dan Wali Kelas</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="tampil_walikelas.php">Wali Kelas</a></li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <form method="POST" action="">
          <table class="table">
            <tr>
              <td width="160px">Kelas</td>
              <td><input class="form-control" type="text" name="kelas" maxlength="40" required /></td>
            </tr>
            <tr>
              <td width="160px">Guru</td>
              <td><input class="form-control" type="text" name="guru" maxlength="30" required /></td>
            </tr>
            <tr>
              <td></td>
              <td><input class="btn btn-success" type="submit" value="Simpan" required /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- untuk memproses form -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $kelas = $_POST['kelas'];
  $guru = $_POST['guru'];

  if ($kelas == '' || $guru == '') {
    echo "Form belum lengkap!!!";
  } else {
    //simpan data
    $simpan = mysqli_query($konek, "INSERT INTO walikelas(kelas,guru)
							VALUES ('$kelas','$guru')");

    if (!$simpan) {
      echo "Simpan data gagal!!!";
    } else {
      echo "<script>window.location.href='tampil_walikelas.php';</script>";
    }
  }
}
?>

<?php include "footer.php"; ?>