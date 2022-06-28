<?php
include "koneksi.php";
if (isset($_POST['simpan'])) {
$id =$_POST ['id_ke'];
$hari   = $_POST ['vaksin_ke'];
$cek = mysqli_query($koneksi, "SELECT * FROM vaksin_ke WHERE id_ke='$id'") or die(mysqli_error($koneksi));

if(mysqli_num_rows($cek) == 0){
$sql = mysqli_query($koneksi, "INSERT INTO vaksin_ke(vaksin_ke)
VALUES ('$hari')") or die(mysqli_error($koneksi));

if($sql){
    echo '<script>alert("Berhasil menambahkan data."); document.location="halaman.php?page=vaksin_ke";</script>';
}else{
    echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
}
}else{
echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
}
}
?>