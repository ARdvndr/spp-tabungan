<?php
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	$hapus = mysqli_query($konek, "DELETE FROM tajar WHERE idtahunajaran='$_GET[id]'");
	
	if($hapus){
		header('location:tampil_tahunajaran.php');
	}else{
		echo "Hapus data gagal, data guru digunakan di tabel wali kelas<br>
			<a href='tampil_tahunajaran.php'><<< Kembali</a>";
	}
}else{
	echo "Anda tidak memiliki akses ke halaman ini!!!";
}
?>