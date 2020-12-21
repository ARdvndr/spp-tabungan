<?php include "header.php"; ?>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Laporan</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active">Laporan</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-4">
				<table class="table table-sm table-borderless">
					<tr>
						<td>Laporan Guru</td>
						<td><a class="btn btn-primary btn-sm" href="laporan_data_guru.php" target="_blank">Print</a></td>
					</tr>

					<tr>
						<td>Laporan Siswa</td>
						<td><a class="btn btn-primary btn-sm" href="laporan_data_siswa.php" target="_blank">Print</a></td>
					</tr>

					<tr>
						<td>Laporan Pembayaran</td>
						<td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalLapBayar">Pilih</button></td>
					</tr>
					<tr>
						<td>Laporan Tunggakan</td>
						<td><a class="btn btn-primary btn-sm" href="laporan_tunggakan.php" target="_blank">Print</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalLapBayar" tabindex="-1" aria-labelledby="modalLapBayarLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLapBayarLabel">Laporan Pembayaran</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<select class="form-select mb-2" name="tahunajaran">
					<option selected>--- Pilih Tahun Ajaran ---</option>
				</select>

				<select class="form-select mb-2" name="kelas">
					<option selected>--- Pilih Kelas ---</option>
				</select>

				<select class="form-select mb-2" name="bulan">
					<option selected>--- Pilih Bulan ---</option>
				</select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Print</button>
			</div>
		</div>
	</div>
</div>

<?php include "footer.php"; ?>