
<?php 
    session_start();  
    if($_GET['id_siswa']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($koneksi,"delete from siswa where id_siswa='".$_GET['id_siswa']."'");
        if($qry_hapus){
            $set_ai = mysqli_query($koneksi, "ALTER TABLE siswa DROP id_siswa");
            $set_ai2 = mysqli_query($koneksi, "ALTER TABLE siswa ADD id_siswa INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
            echo "<script>alert('Sukses hapus siswa');location.href='halaman.php?page=pasien';</script>";
        } else {
            echo "<script>alert('Gagal hapus siswa');location.href='halaman.php?page=pasien';</script>";
        }
    }
?>