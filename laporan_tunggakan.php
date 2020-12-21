<?php 

session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Tunggakan</title>
	<style type="text/css">
		body{
			font-family: Arial;
		}
		@media print {
			.no-print{
				display: none;
			}
		}

		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
<h3>SMK DEWI SARTIKA<br/>LAPORAN TUNGGAKAN SPP</h3>
<hr/>
<table  width="100%" border="1" cellspacing="0" cellpadding="4">
	<tr>
		<th>No.</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Tagihan Bulan</th>
		<th>Jumlah Tagihan</th>
		<th>Keterangan</th>
	</tr>
	<?php 
	$sqlTagihan = mysqli_query($konek, "SELECT spp.*, siswa.nis,siswa.namasiswa,siswa.kelas FROM spp INNER JOIN siswa ON spp.idsiswa=siswa.idsiswa WHERE spp.ket is null
		 ORDER BY siswa.namasiswa ASC");
	$no=1;
	while ($d=mysqli_fetch_array($sqlTagihan)) {
		echo "<tr>
			<td align='center'>$no</td>
			<td align='center'>$d[nis]</td>
			<td>$d[namasiswa]</td>
			<td align='center'>$d[kelas]</td>
			<td>$d[bulan]</td>
			<td align='right'>$d[jumlah]</td>
			<td>Belum Dibayar</td>
		</tr>";
		$no++;
		$total = $d['jumlah'];
	}
	?>
	<tr>
		<td colspan="5" align="right">Total Tagihan</td>
		<td align="right"><b><?php echo $total; ?></b></td>
		<td></td>
	</tr>
</table>

<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<p>Jakarta, <?php echo date('d/m/Y'); ?><br/>
			Operator, </p>
			<br/>
			<br/>
			<p>______________________</p>
		</td>
	</tr>
</table>
<a href="#" class="no-print" onclick="window.print();">Cetak/Print</a>
<a href="excel_laporan_pembayaran.php?tgl1=<?php echo $_GET['tgl1']; ?> &tgl2=<?php echo $_GET['tgl2']; ?>"
	class="no-print" target="_blank">Export ke Excel</a>
</body>
</html>

<?php
}else{
	header('location:login.php');
}
?>