<?php include "header.php"; ?>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Data Guru</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item active">Guru</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<a class="btn btn-primary" style="margin-bottom: 10px" href="tambah_guru.php">Tambah Data</a>
				<table class="table table-bordered table-striped">
					<tr>
						<th>No</th>
						<th>Nama Guru</th>
						<th>Aksi</th>
					</tr>
					<?php
					$sql = mysqli_query($konek, "SELECT * FROM guru ORDER BY idguru ASC");
					$no = 1;
					while ($d = mysqli_fetch_array($sql)) {
						echo "<tr>
				<td width='60px' align='center'>$no</td>
				<td>$d[namaguru]</td>
				<td width='160px' align='center'>
					<a class='btn btn-warning btn-sm' href='edit_guru.php?id=$d[idguru]'>Edit</a> 
					<a class='btn btn-danger btn-sm' href='hapus_guru.php?id=$d[idguru]'>Hapus</a>
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

<?php include "footer.php"; ?>