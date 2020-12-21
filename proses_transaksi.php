<?php
session_start();
if (isset($_SESSION['login'])) {
	include "koneksi.php";

	if (isset($_POST['submit'])) {
		$idspp 	= $_POST['idspp'];
		$nis	= $_POST['nis'];
		$nombay	= $_POST['nombay'];

		//membuat nomor pembayaran
		$today = date("ymd");
		$query = mysqli_query($konek, "SELECT max(RIGHT(nobayar, 4)) AS last FROM bayar WHERE nobayar LIKE '$today%'");
		if (mysqli_num_rows($query) > 0) {
			$data = mysqli_fetch_array($query);
			$last = $data['last'] + 1;
			$nextNoBayar	= strval($today) . sprintf('%04s', $last);
		} else {
			$nextNoBayar = $today . '0001';
		}

		//tanggal Bayar
		$tglBayar = date('Y-m-d');

		//id admin
		$admin = $_SESSION['id'];

		mysqli_query($konek, "INSERT bayar VALUES ('', '$idspp', '$nextNoBayar', '$tglBayar', $nombay)");

		$result = mysqli_query($konek, "SELECT * FROM spp WHERE idspp='$idspp'");
		$row = mysqli_fetch_array($result);
		$sisa = $row['tunggakan'] - $nombay;

		if ($sisa > 0) {
			$ket = "BELUM LUNAS";
		} else {
			$ket = "LUNAS";
		}

		mysqli_query($konek, "UPDATE spp SET tunggakan=$sisa, ket='$ket' WHERE idspp='$idspp'");

		header('location:transaksi.php?nis=' . $nis);
	}

	if(isset($_GET['act'])) {
		if ($_GET['act'] = 'batal') {
			$nis = $_GET['nis'];
			$idbayar = $_GET['id'];
			// $idspp = $_GET['spp'];
	
			$q = mysqli_query($konek, "SELECT idspp, jumlah_bayar FROM bayar WHERE idbayar='$idbayar'");
			$r = mysqli_fetch_assoc($q);
	
			mysqli_query($konek, "UPDATE spp SET tunggakan=tunggakan+$r[jumlah_bayar], ket='BELUM LUNAS' WHERE idspp=$r[idspp]");
			mysqli_query($konek, "DELETE FROM bayar WHERE idbayar=$idbayar");
	
			header('location:transaksi.php?nis=' . $nis);
		}
	}
}


	// if($_GET['act']=='bayar'){

	// 	$idspp 	= $_GET['id'];
	// 	$nis	= $_GET['nis'];

	// 	//membuat nomor pembayaran
	// 	$today = date("ymd");
	// 	$query = mysqli_query($konek, "SELECT max(nobayar) AS last FROM bayar WHERE nobayar LIKE '$today%'");
	// 	$data = mysqli_fetch_array($query);
	// 	$lastNoBayar	= $data['last'];
	// 	$lastNoUrut		= substr($lastNoBayar, 6, 4);
	// 	$nextNoUrut		= $lastNoUrut + 1;
	// 	$nextNoBayar	= $today.sprintf('%04s', $nextNoUrut);

	// 	//tanggal Bayar
	// 	$tglBayar 	= date('Y-m-d');

	// 	//id admin
	// 	$admin = $_SESSION['id'];

	// 	mysqli_query($konek, "INSERT bayar VALUES ('', '$idspp', '$nextNoBayar', '$tglbayar', '')");

	// 	header('location:transaksi.php?nis='.$nis);
	// }
	// elseif($_GET['act']='batal'){

	// 	$idspp 	= $_GET['id'];
	// 	$nis	= $_GET['nis'];

	// 	mysqli_query($konek, "UPDATE bayar SET nobayar=null,
	// 										tglbayar=null,
	// 										ket=null,
	// 										idadmin=null
	// 								WHERE idspp='$idspp'");

	// 	header('location:transaksi.php?nis='.$nis);
	// }