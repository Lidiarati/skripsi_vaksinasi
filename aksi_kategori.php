<?php
include "koneksi.php";
if (isset($_POST['simpan'])) {
$id =$_POST ['id_kategori'];
$hari   = $_POST ['kategori'];
$cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'") or die(mysqli_error($koneksi));

if(mysqli_num_rows($cek) == 0){
$sql = mysqli_query($koneksi, "INSERT INTO kategori(kategori)
VALUES ('$hari')") or die(mysqli_error($koneksi));

if($sql){
    echo '<script>alert("Berhasil menambahkan data."); document.location="halaman.php?page=kategori";</script>';
}else{
    echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
}
}else{
echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
}
}
?>