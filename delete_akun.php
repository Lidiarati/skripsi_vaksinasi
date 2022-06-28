<?php 
    session_start();  
    if($_GET['id']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($koneksi,"delete from akun where id='".$_GET['id']."'");
        $qry_hapus2=mysqli_query($koneksi,"delete from siswa where email='".$_GET['email']."'");
        if($qry_hapus){
            $set_ai = mysqli_query($koneksi,"ALTER TABLE akun DROP id");
            $set_ai2 = mysqli_query($koneksi,"ALTER TABLE akun ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
            $set_ai3 = mysqli_query($koneksi,"ALTER TABLE siswa DROP id_siswa");
            $set_ai4 = mysqli_query($koneksi,"ALTER TABLE siswa ADD id_siswa INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
            echo "<script>alert('Sukses hapus akun');location.href='halaman.php?page=akun';</script>";
        } else {
            echo "<script>alert('Gagal hapus akun');location.href='halaman.php?page=akun';</script>";
        }
    }
?>