<?php include "header.php"; ?>

<?php
$sqlEdit = mysqli_query($konek, "SELECT * FROM tajar WHERE idtahunajaran='$_GET[id]'");
$e = mysqli_fetch_array($sqlEdit);
?>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Edit Tahun Ajaran</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item"><a href="tampil_tahunajaran.php">Tahun Ajaran</a></li>
					<li class="breadcrumb-item active">Edit</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form method="post" action="">
					<input type="hidden" name="idtahunajaran" value="<?php echo $e['idtahunajaran']; ?>" />
					<table class="table">
						<tr>
							<td>Tahun Ajaran</td>
							<td><input type="text" class="form-control" name="tahunajaran" value="<?php echo $e['tahunajaran']; ?>" /></td>
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
	//variable dari elemen form
	$id   = $_POST['idtahunajaran'];
	$nama = $_POST['tahunajaran'];

	if ($nama == '') {
		echo "Form belum lengkap!!!";
	} else {
		//proses edit data guru
		$edit = mysqli_query($konek, "UPDATE tajar SET tahunajaran='$nama' WHERE idtahunajaran='$id'");

		if (!$edit) {
			echo "Edit data gagal!!";
		} else {
			echo "<script>window.location.href='tampil_tahunajaran.php';</script>";
		}
	}
}
?>

<?php include "footer.php"; ?>