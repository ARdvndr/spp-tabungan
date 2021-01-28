<?php include "header.php"; ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Kelas dan Wali Kelas</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Wali Kelas</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a class="btn btn-primary" style="margin-bottom: 10px" href="tambah_walikelas.php">Tambah Data</a>
        <table class="table table-bordered table-striped">
          <tr>
            <th>No.</th>
            <th>Nama Kelas</th>
            <th>Nama Wali Kelas</th>
            <th>Aksi</th>
          </tr>
          <?php
          $sql = mysqli_query($konek, "SELECT *
									FROM walikelas
									ORDER BY walikelas.kelas ASC");
          $no = 1;
          while ($d = mysqli_fetch_array($sql)) {
            echo "<tr>
				<td width='50px' align='center'>$no</td>
				<td>$d[kelas]</td>
				<td>$d[guru]</td>
				<td width='160px' align='center'>
					<a class='btn btn-warning btn-sm' href='edit_walikelas.php?kls=$d[kelas]'>Edit</a>
					<a class='btn btn-danger btn-sm' href='hapus_walikelas.php?kls=$d[kelas]'>Hapus</a>
				</td>
			</tr>";
            $no++;
          }
          ?>
        </table>
      </div>
    </div>
  </div>
</section>

<?php include "footer.php"; ?>