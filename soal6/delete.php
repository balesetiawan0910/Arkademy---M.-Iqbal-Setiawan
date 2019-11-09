<?php

include('config.php');
 

if(isset($_GET['idprod'])){
	
	$id = $_GET['idprod'];
	
	
	$cek = mysqli_query($koneksi, "SELECT * FROM product WHERE id_product='$id'") or die(mysqli_error($koneksi));
	
	
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($koneksi, "DELETE FROM product WHERE id_product='$id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di databasesss."); document.location="index.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di databasess."); document.location="index.php";</script>';
}
 
?>