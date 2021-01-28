<?php include "header.php"; ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Siswa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="tampil_Siswa.php">Siswa</a></li>
          <li class="breadcrumb-item active">Tambah</li>
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
          <table class="table">
            <tr>
              <td width="160px">NIS</td>
              <td><input class="form-control" type="text" name="nis" maxlength="10" required></td>
            </tr>
            <tr>
              <td>Nama Siswa</td>
              <td><input class="form-control" type="text" name="namasiswa" maxlength="40" required></td>
            </tr>
            <tr>
              <td>Kelas</td>
              <td>
                <select name="kelas" class="form-control" required>
                  <option value="" selected>- Pilih Kelas -</option>
                  <?php
                  $sqlKelas = mysqli_query($konek, "select * from walikelas order by kelas ASC");
                  while ($k = mysqli_fetch_array($sqlKelas)) {
                  ?>
                    <option value="<?php echo $k['kelas']; ?>"><?php echo $k['kelas']; ?></option>
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
                    <option value="<?php echo $t['idtahunajaran']; ?>"><?php echo $t['tahunajaran']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Biaya SPP</td>
              <td><input class="form-control" type="text" name="biaya" value="300000" readonly /></td>
            </tr>
            <tr>
              <td>Jatuh Tempo Pertama</td>
              <td>
                <input class="form-control" type="date" name="jatuhtempo" value="<?php echo date('Y-m-d'); ?>" required />
              </td>
            </tr>
            <tr>
              <td></td>
              <td><input class="btn btn-success" type="submit" value="Simpan" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- <div class="container">
	<div class="page-header">
		<h3>Tambah Data Siswa</h3>
	</div>
</div> -->

<!-- simpan data -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //variabel untuk menampung inputan dari form
  $nis   = $_POST['nis'];
  $nama   = $_POST['namasiswa'];
  $kelas   = $_POST['kelas'];
  $tahun   = $_POST['tahunajaran'];
  $biaya   = $_POST['biaya'];
  $tunggakan   = $_POST['biaya'];
  $awaltempo = $_POST['jatuhtempo'];

  // Membuat Array untuk menampung bulan bahasa indonesia
  $bulanIndo = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
  );


  //proses simpan
  if ($nis == '' || $nama == '' || $kelas == '') {
    echo "Form belum lengkap...";
  } else {
    $simpan = mysqli_query($konek, "insert into siswa(nis,namasiswa,kelas,tahunajaran,biaya)
					values('$nis','$nama','$kelas','$tahun','$biaya')");
    if (!$simpan) {
      echo "Penyimpanan data gagal..";
    } else {
      //ambil data id siswa terakhir
      $ds = mysqli_fetch_array(mysqli_query($konek, "SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1"));
      $idsiswa = $ds['idsiswa'];

      //membuat tagihan (12 bulan dimulai dari Juli 2017 dan menyimpan tagihan di tabel spp
      for ($i = 0; $i < 12; $i++) {
        //membuat tanggal jatuh tempo nya setiap tanggal 10
        $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

        $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))] . " " . date('Y', strtotime($jatuhtempo));

        mysqli_query($konek, "INSERT INTO spp(idsiswa,jatuhtempo,bulan,jumlah,tunggakan,ket)
								values('$idsiswa','$jatuhtempo','$bulan','$biaya','$tunggakan','BELUM LUNAS')");
      }

      echo "<script>window.location.href='tampil_siswa.php';</script>";
    }
  }
}
?>
<?php include "footer.php"; ?>