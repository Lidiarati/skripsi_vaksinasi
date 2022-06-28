<?php
    session_start(); 

    include('koneksi.php');
    if(!isset($_GET['id'])){
       header('Location: halaman.php?page=akun');}

    $id_akun=$_GET['id'];
    $qry = mysqli_query($koneksi, "select * from akun where id = '".$id_akun."'");
    $data_akun=mysqli_fetch_array($qry);
?>
<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/vaccine.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin | Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="panel panel-primary"> 
<div class="panel-heading">
    <h1>Edit data </h1>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-8">
   <div class="form-group">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" placeholder="Name" value="<?=$data_akun['nama']?>" name="nama" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email" value="<?=$data_akun['email']?>" name="email" required/>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="item form-group">
				        <div class="col-md-6 col-sm-6 offset-md-3">
					    <input type="submit" name="submit" class="btn btn-primary" value="simpan">
					    <a href="halaman.php?page=pasien" class="btn btn-warning">Kembali</a>
				</div>
            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        
        $query = mysqli_query($koneksi, "update akun set 
        nama = '".$nama."',
        email = '".$email."'
        where id = '".$id_akun."'");
        if($query){
            echo '<script>alert("Berhasil Mengupdate Data."); document.location="halaman.php?page=akun";</script>';
        }else{
            echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
      }
?>


