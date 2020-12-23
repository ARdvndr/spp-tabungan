<form method="POST" action="proses_tabungan.php?act=in">
  <input type="hidden" name="idsiswa" id="idsiswa_in">
  <div class="row g-3 align-items-center mb-2">
    <div class="col-md-2">
      <label for="inputNIS" class="col-form-label">NIS</label>
    </div>
    <div class="col-auto">
      <input type="text" id="nis_in" class="form-control" readonly>
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
      <input type="text" id="nama_in" class="form-control" readonly>
    </div>
  </div>

  <div class="row g-3 align-items-center mb-2">
    <div class="col-md-2">
      <label for="inputKelas" class="col-form-label">Kelas</label>
    </div>
    <div class="col-auto">
      <input type="text" id="kelas_in" class="form-control" readonly>
    </div>
  </div>

  <div class="row g-3 align-items-center mb-2">
    <div class="col-md-2">
      <label for="inputUang" class="col-form-label">Uang Ditabung</label>
    </div>
    <div class="col-auto">
      <input
        type="number"
        name="tabung"
        class="form-control"
        min="1000"
        required
      >
    </div>
    <div class="col-auto">
      <span>Minimal Menabung Rp. 1000</span>
    </div>
  </div>

  <div class="row g-3 align-items-center">
    <div class="col-md-2">
      <button type="submit" class="btn btn-success"><i class="fas fa fa-save"></i> Simpan</button>
    </div>
    <div class="col-auto">
      <button type="reset" class="btn btn-warning"><i class="fas fa fa-window-close"></i> Batal</button>
    </div>
  </div>

</form>
