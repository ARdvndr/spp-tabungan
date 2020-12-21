<?php include "header.php"; ?>

<?php
$sqlEdit = mysqli_query($konek, "SELECT * FROM guru WHERE idguru='$_GET[id]'");
$e = mysqli_fetch_array($sqlEdit);
?>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Edit Data Guru</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item"><a href="tampil_guru.php">Guru</a></li>
					<li class="breadcrumb-item active">Edit</li>
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
					<input type="hidden" name="idguru" value="<?php echo $e['idguru']; ?>" />
					<table class="table">
						<tr>
							<td>Nama Guru</td>
							<td><input type="text" class="form-control" name="namaguru" value="<?php echo $e['namaguru']; ?>" /></td>
						</tr>
						<tr>
							<td></td>
							<td><input class="btn btn-success" type="submit" value="Update" /></td>
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
	$id		= $_POST['idguru'];
	$nama 	= $_POST['namaguru'];

	if ($nama == '') {
		echo "Form belum lengkap!!!";
	} else {
		//proses edit data guru
		$edit = mysqli_query($konek, "UPDATE guru SET namaguru='$nama' WHERE idguru='$id'");

		if (!$edit) {
			echo "Edit data gagal!!";
		} else {
			echo "<script>window.location.href='tampil_guru.php';</script>";
		}
	}
}
?>

<?php include "footer.php"; ?>