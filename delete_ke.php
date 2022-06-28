<?php
include ('koneksi.php');
if (isset($_GET ['id_ke'])){
    $id = $_GET ['id_ke'];
    $cek = mysqli_query($koneksi, "SELECT * FROM vaksin_ke WHERE id_ke='$id'") or die(mysqli_error($koneksi));
    if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM vaksin_ke WHERE id_ke='$id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("berhasil menghapus data."); document.location="halaman.php?page=vaksin_ke";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="halaman.php?page=vaksin_ke";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="halaman.php?page=vaksin_ke";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="halaman.php?page=vaksin_ke";</script>';
}


?>