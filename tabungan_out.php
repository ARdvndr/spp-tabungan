<form method="POST" action="proses_tabungan.php?act=out">
  <input type="hidden" name="idsiswa" id="idsiswa_out">
  <div class="row g-3 align-items-center mb-2">
    <div class="col-md-2">
      <label for="inputNIS" class="col-form-label">NIS</label>
    </div>
    <div class="col-auto">
      <input type="text" id="nis_out" class="form-control" readonly>
    </div>
    <div class="col-auto">
      <a class="btn btn-primary text-light" data-bs-toggle='modal' data-bs-target='#cari_siswa'>
        <i class="fas fa fa-search"></i> Cari Siswa
      </a>
    </div>
  </div>

  <div class="row g-3 align-items-center mb-2">
    <div class="col-md-2">
      <label for="inputNama" class="col-form-label">Nama Siswa</label>
    </div>
    <div class="col-auto">
      <input type="text" id="nama_out" class="form-control" readonly>
    </div>
  </div>

  <div class="row g-3 align-items-center mb-2">
    <div class="col-md-2">
      <label for="inputKelas" class="col-form-label">Kelas</label>
    </div>
    <div class="col-auto">
      <input type="text" id="kelas_out" class="form-control" readonly>
    </div>
  </div>

  <div class="row g-3 align-items-center mb-2">
    <div class="col-md-2">
      <label for="saldo" class="col-form-label">Saldo Terahir</label>
    </div>
    <div class="col-auto">
      <input
        type="number"
        id="saldo"
        name="saldo"
        class="form-control"
        readonly
      >
    </div>
  </div>

  <div class="row g-3 align-items-center mb-2">
    <div class="col-md-2">
      <label for="inputUang" class="col-form-label">Jumlah Penarikan</label>
    </div>
    <div class="col-auto">
      <input
        type="number"
        name="tarik"
        id="tarik"
        class="form-control"
      >
    </div>
  </div>

  <div class="row g-3 align-items-center">
    <div class="col-md-2">
      <button type="submit" id="submit_out" class="btn btn-success"><i class="fas fa-money-bill"></i> Tarik</button>
    </div>
    <div class="col-auto">
      <button type="reset" class="btn btn-warning"><i class="fas fa fa-window-close"></i> Batal</button>
    </div>
  </div>

</form>
