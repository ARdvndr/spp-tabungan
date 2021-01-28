<?php include "header.php"; ?>

<?php
$sqlEdit = mysqli_query($konek, "SELECT * FROM walikelas WHERE kelas='$_GET[kls]'");
$e = mysqli_fetch_array($sqlEdit);
?>


<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Data Kelas dan Wali Kelas</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="tampil_walikelas.php">Wali Kelas</a></li>
          <li class="breadcrumb-item active">Edit</li>
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
              <td><input type="text" class="form-control" name="kelas" value="<?php echo $e['kelas']; ?>" maxlength="40" required></td>
            </tr>
            <tr>
              <td width="160px">Guru</td>
              <td><input class="form-control" type="text" name="guru" value="<?php echo $e['guru']; ?>" maxlength="30" required></td>
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

<!-- untuk memproses form -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $kelas = $_POST['kelas'];
  $guru = $_POST['guru'];

  if ($kelas == '' || $guru == '') {
    echo "Form belum lengkap!!!";
  } else {
    //update data
    $update = mysqli_query($konek, "UPDATE walikelas SET guru='$guru' WHERE kelas='$kelas'");

    if (!$update) {
      echo "Update data gagal!!!";
    } else {
      echo "<script>window.location.href='tampil_walikelas.php';</script>";
    }
  }
}
?>

<?php include "footer.php"; ?>