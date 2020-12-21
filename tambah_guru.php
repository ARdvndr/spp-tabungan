<?php include "header.php"; ?>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Tambah Guru</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item"><a href="tampil_guru.php">Guru</a></li>
					<li class="breadcrumb-item active">Tambah</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form method="post" action="">
					<table class="table">
						<tr>
							<td>Nama Guru</td>
							<td><input class="form-control" type="text" name="namaguru" /></td>
						</tr>
						<tr>
							<td></td>
							<td><input class="btn btn-success" type="submit" value="Simpan" /></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</section>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//variabel dari elemen form
	$nama = mysqli_real_escape_string($konek, $_POST['namaguru']);

	if ($nama == '') {
		echo "Form belum lengkap!!!";
	} else {
		//proses simpan data guru
		$simpan = mysqli_query($konek, "INSERT INTO guru(namaguru) VALUES ('$nama')");

		if (!$simpan) {
			echo "Simpan data gagal!!";
		} else {
			echo "<script>window.location.href='tampil_guru.php';</script>";
		}
	}
}
?>

<?php include "footer.php"; ?>