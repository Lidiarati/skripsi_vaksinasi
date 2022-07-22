<?php
    session_start();  
    include('koneksi.php');
    if(!isset($_GET['id_siswa'])){
       header('Location: halaman.php?page=pasien');}

    $id_siswa=$_GET['id_siswa'];
    $qry = mysqli_query($koneksi, "SELECT * FROM siswa 
    inner join kategori on siswa.id_kategori = kategori.id_kategori
    inner join jenis_vaksin on siswa.id_jenis = jenis_vaksin.id_jenis
    inner join jadwal1 on siswa.id_jadwal = jadwal1.id_jadwal
    inner join vaksin_ke on siswa.id_ke = vaksin_ke.id_ke where id_siswa = '".$id_siswa."'");
    $data_siswa=mysqli_fetch_array($qry);
?>
<html>
<head>
<meta charset ="utf-8">
    <meta name = "viewport" content ="widht=device-width, initial-scale=1">
<link rel="stylesheet" href="style2.css" class="rel">
</head>
<body>
   <section class ="content"> 
       <h2>Detail Pasien</h2>
        <div class="box">
        <table class="table-data" border="0">
        <tr>
           <td>Nomor Antrian</td>
           <td>:</td>
           <td><?=$data_siswa['id_siswa']?></td>
       </tr>
       <tr>
           <td>Tanggal Daftar</td>
           <td>:</td>
           <td><?=$data_siswa['tgl_daftar']?></td>
       </tr>
       <tr>
           <td>Nama Lengkap</td>
           <td>:</td>
           <td><?=$data_siswa['nama']?></td>
       </tr>
       <tr>
           <td>Email</td>
           <td>:</td>
           <td><?=$data_siswa['email']?></td>
       </tr>
       <tr>
           <td>NIK</td>
           <td>:</td>
           <td> <?=$data_siswa['nis']?></td>
       </tr>
       <tr>
           <td>Alamat</td>
           <td>:</td>
           <td><?=$data_siswa['alamat']?></td>
       </tr>
       <tr>
           <td>Tanggal Lahir</td>
           <td>:</td>
           <td><?=$data_siswa['tgl_lahir']?></td>
       </tr>
       <tr>
           <td>Jenis Kelamin</td>
           <td>:</td>
           <td><?=$data_siswa['kelamin']?></td>
       </tr>
       <tr>
           <td>Tanggal Vaksin</td>
           <td>:</td>
           <td><?=$data_siswa['tanggal']?></td>
       </tr>
       <tr>
           <td>Kategori</td>
           <td>:</td>
           <td><?=$data_siswa['kategori']?></td>
       </tr>
       <tr>
           <td>Jenis Vaksin</td>
           <td>:</td>
           <td><?=$data_siswa['jenis_vaksin']?></td>
       </tr>
       <tr>
           <td>Vaksin Ke</td>
           <td>:</td>
           <td><?=$data_siswa['vaksin_ke']?></td>
       </tr>
   </table>
   <div>
       <a href="halaman.php?page=pasien" class="btn btn-danger">Kembali</a>
    </div>
   </div>
   
   </section>
</body>
</html>
