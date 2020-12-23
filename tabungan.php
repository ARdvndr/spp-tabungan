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

<?php
$tab_pills = [
  0 => array(
    "href" => "tambah",
    "name" => "Tambah Tabungan",
    "content" => "tabungan_in.php",
  ),
  1 => array(
    "href" => "ambil",
    "name" => "Ambil Tabungan",
    "content" => "tabungan_out.php",
  ),
];
?>

<section class="content">
  <div class="container-fluid">
    <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
      <?php
      foreach ($tab_pills as $tp) {
        echo "
          <li class='nav-item' role='presentation'>
          <a
            class='nav-link " . ($tp['href'] === 'tambah' ? 'active' : '') . "'
            id='pills-$tp[href]-tab'
            data-bs-toggle='pill'
            href='#pills-$tp[href]'
            role='tab'
            aria-controls='pills-$tp[href]'
            aria-selected='true'
          >
          $tp[name]
          </a>
        </li>";
      }
      ?>
    </ul>

    <div class="tab-content" id="pills-tabContent">
      <?php
      foreach ($tab_pills as $content) {
        echo "
        <div
          class='tab-pane fade show " . ($content['href'] === 'tambah' ? 'active' : '') . "'
          id='pills-$content[href]'
          role='tabpanel'
            aria-labelledby='pills-$content[href]-tab'
          >";
        include $content['content'];
        echo "</div>";
      }
      ?>
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
      swal('Berhasil', '<?= $_SESSION['temp_alert']['msg']; ?>'.replace(/\\n/g,"\n"), 'success');
    <?php } else { ?>
      swal('Kesalahan', '<?= $_SESSION['temp_alert']['msg']; ?>'.replace(/\\n/g,"\n"), 'error');
    <?php } ?>

    setInterval(() => {
      <?php unset($_SESSION['temp_alert']); ?>
    }, 1000)
  </script>
<?php } ?>