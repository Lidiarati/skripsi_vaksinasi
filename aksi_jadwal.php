<?php
include "koneksi.php";
if (isset($_POST['simpan'])) {
$id =$_POST ['id_jadwal'];
$hari   = $_POST ['sesi'];
$jam_buka      =$_POST['antrian'];
$jam_tutup         =$_POST['waktu'];
$no_antrian            =$_POST['tanggal'];
$lokasi_vaksin = $_POST ['tempat'];
$cek = mysqli_query($koneksi, "SELECT * FROM jadwal1 WHERE id_jadwal='$id'") or die(mysqli_error($koneksi));

if(mysqli_num_rows($cek) == 0){
$sql = mysqli_query($koneksi, "INSERT INTO jadwal1(sesi, antrian, jam, tanggal, tempat)
VALUES ('$hari','$jam_buka','$jam_tutup','$no_antrian','$lokasi_vaksin')") or die(mysqli_error($koneksi));

if($sql){
    echo '<script>alert("Berhasil menambahkan data."); document.location="halaman.php?page=jadwal";</script>';
}else{
    echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
}
}else{
echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
}
}
?>