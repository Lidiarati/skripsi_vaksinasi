<?php
include "koneksi.php";
if (isset($_POST['simpan'])) {
$id =$_POST ['id_jenis'];
$hari   = $_POST ['jenis_vaksin'];
$cek = mysqli_query($koneksi, "SELECT * FROM jenis_vaksin WHERE id_jenis='$id'") or die(mysqli_error($koneksi));

if(mysqli_num_rows($cek) == 0){
$sql = mysqli_query($koneksi, "INSERT INTO jenis_vaksin(jenis_vaksin)
VALUES ('$hari')") or die(mysqli_error($koneksi));

if($sql){
    echo '<script>alert("Berhasil menambahkan data."); document.location="halaman.php?page=tanggal_vaksin";</script>';
}else{
    echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
}
}else{
echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
}
}
?>