<?php 

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_pembayaran.xls");
	include "koneksi.php";
	?>


<h3>SMK DEWI SARTIKA<br/>LAPORAN PEMBAYARAN</h3>

<p>Tanggal : <?php echo $_GET['tgl1']." sampai ".$_GET['tgl2']; ?></p>
<table  width="100%" border="1" cellspacing="0" cellpadding="4">
	<tr>
		<th>No.</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>No. Bayar</th>
		<th>Pembayaran Bulan</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
	</tr>
	<?php 
	$sqlBayar = mysqli_query($konek, "SELECT spp.*, siswa.nis,siswa.namasiswa,siswa.kelas FROM spp INNER JOIN siswa ON spp.idsiswa=siswa.idsiswa WHERE tglbayar BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]' ORDER BY tglbayar ASC");
	$no=1;
	while ($d=mysqli_fetch_array($sqlBayar)) {
		echo "<tr>
			<td align='center'>$no</td>
			<td align='center'>$d[nis]</td>
			<td>$d[namasiswa]</td>
			<td align='center'>$d[kelas]</td>
			<td align='center'>$d[nobayar]</td>
			<td>$d[bulan]</td>
			<td align='right'>$d[jumlah]</td>
			<td>$d[ket]</td>
		</tr>";
		$no++;
		$total = $d['jumlah'];
	}
	?>
	<tr>
		<td colspan="6" align="right">Total</td>
		<td align="right"><b><?php echo $total; ?></b></td>
		<td></td>
	</tr>
</table>
