<?php include "header.php" ?>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Tahun Ajaran</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active">Tahun Ajaran</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<a class="btn btn-primary" style="margin-bottom: 10px" href="tambah_tahunajaran.php">Tambah Data</a>
				<table class="table table-bordered table-striped">
					<tr>
						<th>No.</th>
						<th>Tahun Ajaran</th>
						<th>Aksi</th>
					</tr>
					<?php
					$sql = mysqli_query($konek, "SELECT * FROM tajar ORDER BY idtahunajaran ASC");
					$no = 1;
					while ($t = mysqli_fetch_array($sql)) {
						echo "<tr>
				<td width='60px' align='center>'>$no</td>
				<td>$t[tahunajaran]</td>
				<td width='160px' align='center'>
					<a class='btn btn-warning btn-sm' href='edit_tahunajaran.php?id=$t[idtahunajaran]'>Edit</a> 
					<a class='btn btn-danger btn-sm' href='hapus_tahunajaran.php?id=$t[idtahunajaran]'>Hapus</a>
				</td>
			</tr>";
						$no++;
					}
					?>
				</table>
			</div>
		</div>
	</div>
</section>

<?php include "footer.php" ?>