<?php include "header.php"; ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 id="path">Tabungan Siswa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Tabungan Siswa</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">

    <div class="d-flex justify-content-between align-items-start">

      <div>
        <div class="card mb-3" style="width: 25rem;">
          <div class="card-header d-flex justify-content-between">
            <h3 class="col-md-6">Biodata Siswa</h3>
            <a class="col-md-4 btn btn-primary text-light" data-bs-toggle='modal' data-bs-target='#cari_siswa'>
              <i class="fas fa fa-search"></i> Cari Siswa
            </a>
            <button class="btn btn-danger" style="display: none;" id="remove">
              <span>&times;</span>
            </button>
          </div>

          <div class="card-body">
            <table class="table table-sm table-borderless" id="biodata_siswa"></table>
          </div>

          <div class="card-footer text-right" style="display: none;" id="cetak">
            <form action="cetak_tabungan.php" method="post" target="_blank">
              <input type="hidden" name="nis" id="nis">
              <input type="submit" class="btn btn-primary" value="Cetak">
            </form>
          </div>
        </div>
      </div>

      <div style="width: 60%;">
        <div class="card mb-3" style="width: 100%;">
          <div class="card-header d-flex justify-content-between">
            <h3 class="col-auto">Riwayat Tabungan Siswa</h3>
            <button class="btn btn-success btn-sm" style="display: none;" id="tambah_tabungan" data-bs-toggle='modal' data-bs-target='#modal_tambah'>
              Tambah tabungan
            </button>

            <button class="btn btn-warning btn-sm" style="display: none;" id="ambil_tabungan" data-bs-toggle='modal' data-bs-target='#modal_ambil'>
              Ambil Tabungan
            </button>
          </div>

          <div class="card-body">
            <label id="saldo" style="display: none;"></label>

            <div class="d-flex justify-content-between align-items-start" id="rincian_tabungan">

              <div style="display: none; width:48%; " id="tbl_in">
                <label>Detail Menabungan</label>
                <div style="height: 250px;overflow-y: auto;">
                  <table class="table table-sm table-bordered" style="font-size: 14px;">
                    <thead class="bg-secondary">
                      <tr>
                        <th class="sticky-top bg-secondary">No</th>
                        <th class="sticky-top bg-secondary">Nominal Tabungan</th>
                        <th class="sticky-top bg-secondary">Tanggal Menabung</th>
                      </tr>
                    </thead>
                    <tbody id="tabungan_in"></tbody>
                  </table>
                </div>
              </div>

              <div style="display: none; width: 48%;" id="tbl_out">
                <label>Detail Ambil Tabungan</label>
                <div style="height: 250px; overflow-y: auto;">
                  <table class="table table-sm table-bordered" style="font-size: 14px;">
                    <thead class="bg-secondary">
                      <tr>
                        <th class="sticky-top bg-secondary">No</th>
                        <th class="sticky-top bg-secondary">Nominal Penarikan</th>
                        <th class="sticky-top bg-secondary">Tanggal Penarikan</th>
                      </tr>
                    </thead>
                    <tbody id="tabungan_out"></tbody>
                  </table>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<?php
include "modal_tabungan.php";
include "footer.php";
?>


<?php if (!empty($_SESSION['temp_alert'])) { ?>
  <script>
    <?php if ($_SESSION['temp_alert']['stats'] === "success") { ?>
      swal('Berhasil', '<?= $_SESSION['temp_alert']['msg']; ?>'.replace(/\\n/g, "\n"), 'success');
    <?php } else { ?>
      swal('Kesalahan', '<?= $_SESSION['temp_alert']['msg']; ?>'.replace(/\\n/g, "\n"), 'error');
    <?php } ?>

    setInterval(() => {
      <?php unset($_SESSION['temp_alert']); ?>
    }, 1000)
  </script>
<?php } ?>