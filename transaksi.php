<?php
include "header.php";

if (isset($_GET['print'])) {
  echo '<script>
  var newWindow = window.open("kwitansi_transaksi.php?id=' . $_GET['print'] . '", "_blank"); 
  </script>';
}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Transaksi Pembayaran SPP</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Pembayaran SPP</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <form action="" method="get">
          <div class="form-row align-items-center">
            <div class="col-auto">
              <div class="input-group mb-3">
                <span class="input-group-text">NIS</span>
                <input type="text" class="form-control" id="nis" name="nis">
              </div>
            </div>
            <div class="col-auto">
              <button type="submit" name="cari" class="btn btn-primary text-light mb-3">
                <i class="fas fa fa-search"></i> Cari Siswa
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <?php
    if (isset($_GET['nis']) && $_GET['nis'] != '') {
      $sqlSiswa = mysqli_query($konek, "SELECT * FROM siswa LEFT JOIN tajar ON siswa.tahunajaran=tajar.idtahunajaran WHERE nis='$_GET[nis]'");
      $ds = mysqli_fetch_array($sqlSiswa);
      $nis = $ds['nis'];
    ?>
      <div class="row">
        <div class="col-6">
          <div class="card mb-3">
            <h3 class="card-header">Biodata Siswa</h3>

            <div class="card-body">
              <table id="tableBiodata" class="table table-sm table-borderless">
                <tr>
                  <td width="120px">NIS</td>
                  <td width="20px">:</td>
                  <td><?php echo $ds['nis']; ?></td>
                </tr>
                <tr>
                  <td>Nama Siswa</td>
                  <td>:</td>
                  <td><?php echo $ds['namasiswa']; ?></td>
                </tr>
                <tr>
                  <td>Kelas</td>
                  <td>:</td>
                  <td><?php echo $ds['kelas']; ?></td>
                </tr>
                <tr>
                  <td>Tahun Ajaran</td>
                  <td>:</td>
                  <td><?php echo $ds['tahunajaran']; ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

      <h3>Tagihan SPP Siswa</h3>
      <table id="tableSPP" class="table" style="width:100%">
        <thead>
          <tr>
            <th class='align-middle text-center'>No</th>
            <th class='align-middle'>Bulan</th>
            <th class='align-middle'>Jatuh Tempo</th>
            <th class='align-middle text-center'>No. Bayar</th>
            <th class='align-middle text-center'>Tgl. Bayar</th>
            <th class='align-middle text-center'>Jumlah</th>
            <th class='align-middle text-center'>Tunggakan</th>
            <th class='align-middle text-center'>Keterangan</th>
            <th colspan="2" class='align-middle text-center'>Aksi</th>
            <th style="display: none;"></th>
          </tr>
        </thead>

        <tbody>
          <?php
          $query = "SELECT * FROM spp
					LEFT JOIN bayar ON spp.idspp = bayar.idspp
					WHERE idsiswa='$ds[idsiswa]'
					UNION 
					SELECT * FROM spp
					RIGHT JOIN bayar ON spp.idspp = bayar.idspp
					WHERE idsiswa='$ds[idsiswa]'
					ORDER BY jatuhtempo ASC";
          $sql = mysqli_query($konek, $query);
          $no = 1;
          while ($d = mysqli_fetch_array($sql)) {
            echo "
						<tr>
							<td class='align-middle text-center' width='50px'>$no</td>
							<td class='align-middle'>$d[bulan]</td>
							<td class='align-middle'>$d[jatuhtempo]</td>
							<td class='align-middle text-center'>$d[nobayar]</td>
							<td class='align-middle text-center'>$d[tglbayar]</td>
							<td class='align-middle text-center'>$d[jumlah_bayar]</td>
							<td class='align-middle text-center'>$d[tunggakan]</td>
							<td class='align-middle text-center'>$d[ket]</td>";
            if ($d['tunggakan'] === $d['jumlah']) {
              echo "
								<td class='align-middle text-center' colspan=2>
									<button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#bayar$d[0]'>Bayar</button>
								</td>
								<td style='display: none;'></td>";
            } else {
              echo "
							<td class='align-middle text-center'>
								<a class='btn btn-danger' href='proses_transaksi.php?nis=$nis&act=batal&id=$d[idbayar]&spp=$d[idspp]'>Batal</a>
							</td>";

              if ($d['tunggakan'] > 0) {
                echo "
								<td class='align-middle text-center'>
									<button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#bayar$d[0]'>Bayar</button>
								</td>";
              } else {
                echo "
								<td class='align-middle text-center'>
									<a class='btn btn-default' href='cetak_slip_transaksi.php?nis=$nis&id=$d[idspp]' target='_blank'>Cetak</a>
								</td>";
              }
            }
            echo "</tr>";
            $no++;
          }
          ?>
        </tbody>

      </table>

    <?php
    }
    ?>
  </div>
</section>

<script>
  var table = $(document).ready(function() {
    $('#tableSPP').DataTable({
      paging: false,
      ordering: false,
      info: false,
      searching: false,
      columns: [{
          name: 'no',
          title: 'No'
        },
        {
          name: 'bulan',
          title: 'Bulan'
        },
        {
          name: 'jatuhtempo',
          title: 'Jatuh Tempo'
        },
        {
          title: 'No Bayar'
        },
        {
          title: 'Tgl Bayar'
        },
        {
          title: 'Jumlah'
        },
        {
          name: 'tunggakan',
          title: 'Tunggakan'
        },
        {
          name: 'ket',
          title: 'Keterangan'
        },
        {
          name: 'batal',
        },
        {
          name: 'bayar',
        }
      ],
      rowsGroup: [
        'jatuhtempo:name',
        'bulan:name',
        'tunggakan:name',
        'ket:name',
        'bayar:name'
      ]
    });
  });
</script>

<?php
include "modal_spp.php";
include "footer.php";
?>