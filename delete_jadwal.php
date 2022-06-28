<?php 
    session_start();  
    if($_GET['id_jadwal']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($koneksi,"delete from jadwal1 where id_jadwal='".$_GET['id_jadwal']."'");
        if($qry_hapus){
            $set_ai = mysqli_query($koneksi, "ALTER TABLE jadwal1 DROP id_jadwal");
            $set_ai2 = mysqli_query($koneksi, "ALTER TABLE jadwal1 ADD id_jadwal INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
            echo "<script>alert('Sukses hapus jadwal');location.href='halaman.php?page=jadwal';</script>";
        } else {
            echo "<script>alert('Gagal hapus jadwal');location.href='jadwal.php';</script>";
        }
    }
?>