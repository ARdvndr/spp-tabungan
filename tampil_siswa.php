<?php include "header.php"; ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Siswa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Siswa</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a class="btn btn-primary" style="margin-bottom: 10px" href="tambah_siswa.php">Tambah Data</a>

        <table class="table table-bordered table-striped">
          <tr>
            <th class="text-center">No.</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Tahun Ajaran</th>
            <th>Biaya</th>
            <th>
              <center>Aksi</center>
            </th>
          </tr>

          <?php
          $sql = mysqli_query($konek, "select * from siswa order by kelas asc");
          $no = 1;
          while ($d = mysqli_fetch_array($sql)) {
            echo "<tr>
              <td width='60px' align='center'>$no</td>
              <td>$d[nis]</td>
              <td>$d[namasiswa]</td>
              <td>$d[kelas]</td>
              <td>$d[tahunajaran]</td>
              <td>$d[biaya]</td>
              <td>
                <a class='btn btn-warning btn-sm' href='edit_siswa.php?id=$d[idsiswa]'>Edit</a>
                <a class='btn btn-danger btn-sm' href='hapus_siswa.php?id=$d[idsiswa]'>Hapus</a>
              </td>
            </tr>";
            $no++;
          }
          ?>
        </table>

        <p>Menghapus siswa berarti juga menghapus tagihan siswa...</p>
      </div>
    </div>
  </div>
</section>

<?php include "footer.php"; ?>