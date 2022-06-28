<?php
include ('koneksi.php');
if (isset($_GET ['id_kategori'])){
    $id = $_GET ['id_kategori'];
    $cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'") or die(mysqli_error($koneksi));
    if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("berhasil menghapus data."); document.location="halaman.php?page=kategori";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="halaman.php?page=kategori";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="halaman.php?page=kategori";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="halaman.php?page=kategori";</script>';
}


?>