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
              onclick="getDataSiswa({id: ${row.id}, nama: '${row.nama}', nis: ${row.nis}, kelas: '${row.kelas}'})"
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
      if (item !== null) {
        currentSaldo = item.saldo;
      }

      if (currentSaldo === 0) {
        $("#tarik").attr('disabled', true);
        $("#submit_out").attr('disabled', true);
      } else {
        $("#tarik").removeAttr('disabled');
        $("#tarik").attr({
          'max': currentSaldo,
        });
        $("#submit_out").removeAttr('disabled');

      };

      $("#saldo").val(currentSaldo);

    })
  }

  function getDataSiswa(data) {
    $("#cari_siswa").modal('hide');

    if ($("#pills-tambah-tab").hasClass('active')) {
      $("#idsiswa_in").val(data.id);
      $("#nis_in").val(data.nis);
      $("#nama_in").val(data.nama);
      $("#kelas_in").val(data.kelas);

    } else {
      $("#idsiswa_out").val(data.id);
      $("#nis_out").val(data.nis);
      $("#nama_out").val(data.nama);
      $("#kelas_out").val(data.kelas);

      getLastSaldo(data.id);
    }
  }
</script>