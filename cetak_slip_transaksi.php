<?php 

session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan Pembayaran</title>
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
<h3>SMK DEWI SARTIKA<br/>SLIP PEMBAYARAN SPP</h3>
<hr/>
<?php
$qSiswa = mysqli_query($konek, "SELECT * FROM siswa WHERE nis='$_GET[nis]'");
$ds = mysqli_fetch_array($qSiswa);
?>
<table>
	<tr>
		<td width="100">Nama Siswa</td>
		<td width="4">: </td>
		<td><?php echo $ds['namasiswa']; ?></td>
	</tr>
	<tr>
		<td width="100">NIS</td>
		<td width="4">: </td>
		<td><?php echo $ds['nis']; ?></td>
	</tr>
	<tr>
		<td width="100">Kelas</td>
		<td width="4">: </td>
		<td><?php echo $ds['kelas']; ?></td>
	</tr>
</table>
<hr>
<table  width="100%" border="1" cellspacing="0" cellpadding="4">
	<tr>
		<th>No.</th>
		<th>No. Bayar</th>
		<th>Tanggal Pembayaran</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
	</tr>
	<?php 
	$sqlBayar = mysqli_query($konek, "SELECT * FROM bayar WHERE idspp='$_GET[id]' ORDER BY tglbayar ASC");
	$no=1;
	while ($d=mysqli_fetch_array($sqlBayar)) {
		echo "<tr>
			<td align='center'>$no</td>
			<td align='center'>$d[nobayar]</td>
			<td>$d[tglbayar]</td>
			<td align='right'>$d[jumlah_bayar]</td>
			<td>LUNAS</td>
		</tr>";
		$no++;
	}
	?>
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
</body>
</html>

<?php
}else{
	header('location:login.php');
}
?>