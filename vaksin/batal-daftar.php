<?php
    session_start();  
    if($_SESSION['login']!=true){
      header('Location: ./login.php');
    }
    include '../koneksi.php';
    $email = $_POST['email_siswa'];
    $validasi = $_POST['valid'];
    $validasi2 = "saya yakin untuk batal ikut vaksinasi";

    if($validasi == $validasi2){
        $query = mysqli_query($koneksi,"delete from siswa where email='".$email."'");
        $set_ai = mysqli_query($koneksi, "ALTER TABLE siswa DROP id_siswa");
        $set_ai2 = mysqli_query($koneksi, "ALTER TABLE siswa ADD id_siswa INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");

        echo "<script>alert('Sukses membatalkan vaksinasi');location.href='dashboard.php';</script>";
    }else{
        echo "<script>alert('Pernyataan tidak cocok, silahkan coba lagi !');location.href='dashboard.php';</script>";
    }


?>