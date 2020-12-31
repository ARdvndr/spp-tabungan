<?php
include "koneksi.php";
$kelas = $konek->query("SELECT kelas FROM walikelas")->fetch_all();
$siswa = $konek->query("SELECT * FROM siswa")->fetch_all();
?>
<div id="DOM" style="display: none;">
  <?php
  $data = [];
  $no = 1;
  foreach ($siswa as $s) {
    $data[] = array(
      "no" => $no++,
      "id" => $s[0],
      "nis" => $s[1],
      "nama" => $s[2],
      "kelas" => $s[3],
      "tajar" => $s[4],
    );
  }
  echo json_encode($data);
  ?>
</div>

<div class="modal fade" id="cari_siswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Daftar Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <table class="table mt-2 dt-body-nowrap" id="tbl-siswa">
          <thead>
            <tr>
              <th>No</th>
              <th>NIS</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Thn. Ajaran</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="data-siswa"></tbody>
        </table>
      </div>

      <div class="modal-footer">
        <button id="nosave" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">
          Batal
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Tabungan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="proses_tabungan.php?act=in">
          <input type="hidden" name="idsiswa" id="idsiswa_in">
          <div class="row g-3 align-items-center mb-2">
            <div class="col-md-2">
              <label for="inputUang" class="col-form-label">Uang Ditabung</label>
            </div>
            <div class="col-auto">
              <input type="number" name="tabung" class="form-control" min="1000" required>
            </div>
            <div class="col-auto">
              <span>Minimal Menabung Rp. 1000</span>
            </div>
          </div>

          <div class="row g-3 align-items-center">
            <div class="col-auto">
              <button type="submit" class="btn btn-success"><i class="fas fa fa-save"></i> Simpan</button>
            </div>
            <div class="col-auto">
              <button id="nosave" type="reset" class="btn btn-warning" data-bs-dismiss="modal">
                <i class="fas fa fa-window-close"></i> Batal
              </button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modal_ambil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ambil Tabungan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="proses_tabungan.php?act=out">
          <input type="hidden" name="idsiswa" id="idsiswa_out">

          <div class="row g-3 align-items-center mb-2">
            <div class="col-md-3">
              <label for="saldo" class="col-form-label">Saldo Terahir</label>
            </div>
            <div class="col-auto">
              <input type="number" id="currentSaldo" name="currentSaldo" class="form-control" readonly>
            </div>
          </div>

          <div class="row g-3 align-items-center mb-2">
            <div class="col-md-3">
              <label for="inputUang" class="col-form-label">Jumlah Penarikan</label>
            </div>
            <div class="col-auto">
              <input type="number" name="tarik" id="tarik" class="form-control">
            </div>
          </div>

          <div class="row g-3 align-items-center">
            <div class="col-auto">
              <button type="submit" id="submit_out" class="btn btn-success"><i class="fas fa-money-bill"></i> Tarik</button>
            </div>
            <div class="col-auto">
              <button type="reset" class="btn btn-warning"><i class="fas fa fa-window-close"></i> Batal</button>
            </div>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    var data = JSON.parse($("#DOM").html());
    $("#tbl-siswa").DataTable({
      data: data,
      autoWidth: false,
      columns: [{
          data: 'no'
        },
        {
          data: 'nis'
        },
        {
          data: 'nama'
        },
        {
          data: 'kelas'
        },
        {
          data: 'tajar'
        },
        {
          render: function(passData, type, row, meta) {
            passData = `
            <button
              class="btn btn-success btn-sm"
              onclick="getDataSiswa(
                {id: ${row.id}, nama: '${row.nama}', nis: ${row.nis}, kelas: '${row.kelas}', tajar: '${row.tajar}'}
              )"
            >
              Pilih
            </button>`;

            return passData;
          }
        }
      ],
    });
  });

  function getLastSaldo(params) {
    $.ajax({
      url: 'proses_tabungan.php?act=get_saldo&id=' + params,
      method: 'POST',
      dataType: 'JSON',
    }).done((item) => {
      var currentSaldo = 0;
      var htmlIn = "";
      var htmlOut = "";
      var i, j, k, l;

      if (item !== null) {
        currentSaldo = item.saldo;

        if (item.kredit !== undefined) {
          for (i = 0; i < item.kredit.length; i++) {
            htmlIn += `
            <tr>
              <td>${i+1}</td>
              <td>${parseInt(item.kredit[i].nominal).toLocaleString()}</td>
              <td>${item.kredit[i].tgl}</td>
            </tr>
            `;
          }
        }

        if (item.debit !== undefined) {
          for (i = 0; i < item.debit.length; i++) {
            htmlOut += `
            <tr>
              <td>${i+1}</td>
              <td>${parseInt(item.debit[i].nominal).toLocaleString()}</td>
              <td>${item.debit[i].tgl}</td>
            </tr>
            `;
          }
        }

        $("#tbl_in").show();
        $("#tabungan_in").html(htmlIn);
        $("#tbl_out").show();
        $("#tabungan_out").html(htmlOut);

      } else {
        $("#tabungan_in").html(null);
        $("#tabungan_out").html(null);
      }

      if (currentSaldo === 0) {
        $("#ambil_tabungan").attr('disabled', true);
        $("#tarik").attr('disabled', true);
        $("#submit_out").attr('disabled', true);
      } else {
        $("#ambil_tabungan").removeAttr('disabled');
        $("#tarik").removeAttr('disabled');
        $("#tarik").attr({
          'max': currentSaldo,
        });
        $("#submit_out").removeAttr('disabled');

      };

      $("#saldo").show();
      $("#currentSaldo").val(currentSaldo);
      $("#saldo").html("Saldo Saat Ini: Rp. " + parseInt(currentSaldo).toLocaleString());

    })
  }

  $("#remove").on('click', () => {
    $("#biodata_siswa").html(null);
    $("#saldo").hide();
    $("#remove").hide();
    $("#tbl_in").hide();
    $("#tbl_out").hide();
    $("#tambah_tabungan").hide();
    $("#ambil_tabungan").hide();
  });

  function getDataSiswa(data) {
    $("#cari_siswa").modal('hide');

    var tableData = '';
    tableData = `
    <tr>
      <td width="120px">NIS</td>
      <td width="20px">:</td>
      <td>${data.nis}</td>
    </tr>
    <tr>
      <td>Nama Siswa</td>
      <td>:</td>
      <td>${data.nama}</td>
    </tr>
    <tr>
      <td>Kelas</td>
      <td>:</td>
      <td>${data.kelas}</td>
    </tr>
    <tr>
      <td>Tahun Ajaran</td>
      <td>:</td>
      <td>${data.tajar}</td>
    </tr>
    `;

    $("#idsiswa_out").val(data.id);
    $("#idsiswa_in").val(data.id);

    $("#biodata_siswa").html(tableData);
    $("#remove").show();
    $("#tambah_tabungan").show();
    $("#ambil_tabungan").show();
    getLastSaldo(data.id);
  }
</script>