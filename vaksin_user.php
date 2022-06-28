<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_user.php");
}

?>
<?php 
	include 'koneksi.php';
  if(isset($_POST['submit'])){
    	// ambil 1 id terbesar di kolom id_pendaftaran, lalu ambil 5 karakter aja dari sebelah kanan
		$getMaxId = mysqli_query($koneksi, "SELECT MAX(RIGHT(id_daftar, 5)) AS id FROM pendaftaran");
		$d = mysqli_fetch_object($getMaxId);
		$generateId = 'P'.date('Y'). sprintf("%05s", $d->id + 1);
		// proses insert
		$insert = mysqli_query($koneksi, "INSERT INTO pendaftaran VALUES (
				'".$generateId."',
				'".date('Y-m-d')."',
				'".$_POST['nama_pasien']."',
				'".$_POST['nik']."',
				'".$_POST['alamat']."',
				'".$_POST['tgl_lahir']."',
				'".$_POST['jk']."',
				'".$_POST['no_hp']."',
				'".$_POST['tgl_vaksin']."',
				'".$_POST['kategori']."',
				'".$_POST['jenis_vaksin']."',
				'".$_POST['vaksin_ke']."'
			)");
		if($insert){
			echo '<script> alert("Berhasil melakukan pendaftran vaksinasi.");document.location="tabel_user.php"</script>';
		}else{
			echo 'huft '.mysqli_error($koneksi);
		}
  }
?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="user/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="user/assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>halaman user </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="user/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="user/assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="user/assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="user/assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        Welcome User
                    </a>
                </div>
                <ul class="nav">
                <li>
                        <a class="nav-link" href="halaman_user.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li  class="nav-item active">
                        <a class="nav-link" href="vaksin_user.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Daftar Vaksinasi</p>
                        </a>
                    </li>
                    </li>
                    <li>
                        <a class="nav-link" href="tabel_user.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Table Daftar</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="logout_user.php">
                            <i class="nc-icon nc-notes"></i>
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> User </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="logout_user.php">
                                    <span class="no-icon"class="btn btn-danger square-btn-adjust"> Log out </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
            <div class="panel panel-primary">
<div class="panel-heading">
    <h3>Form pendaftaran Vaksinasi</h3>
</div>
<div class="panel-body label-align"  >
    <div class="row">
        <div class="col-md-12 ">
          <form  method ='POST' action =''>
              <div class =" item form-group">
                  <label> Nama Lengkap</label>
                    <input type="text" name="nama_pasien" class="form-control" required="" autofocus="" data-errormessage-value-missing='Nama masih kosong'>
              </div>
              <div class ="form-group">
                <label> NIK</label>
                  <input type="text" name="nik" class="form-control" required="" autofocus="" data-errormessage-value-missing='NIK masih kosong'>
            </div>
            <div class ="form-group">
                <label> Alamat</label>
                  <textarea type="text" name="alamat" class="form-control"rows="4" required="" autofocus="" data-errormessage-value-missing='Alamat masih kosong'></textarea>
            </div>
            <div class ="form-group">
                <label> Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control" required="" autofocus="" data-errormessage-value-missing='tgl lahir masih kosong' >
            </div>
            <div><label for="jk" class="form-control" required="" autofocus="" data-errormessage-value-missing='jk masih kosong' >Jenis Kelamin </label>
                <label><input type="radio" name="jk" value="laki-laki"> Laki-laki</label> &nbsp; &nbsp;
                <label><input type="radio" name="jk" value="perempuan"> Perempuan</label>
            </div>
            <div class ="form-group">
                <label> No HP</label>
                  <input type="text" name="no_hp" class="form-control" required="" autofocus="" data-errormessage-value-missing='no hp masih kosong'>
            </div> 
            <div class ="form-group">
            <label> Tanggal Vaksin</label>
                <select name="tgl_vaksin" class="form-control" required="" autofocus="" data-errormessage-value-missing='tanggal vaksin masih kosong'>
                        <option value="">--Pilih--</option>
                        <option value="2022-06-06">2022-06-06</option>
                        <option value="2022-06-07">2022-06-07</option>
                        <option value="2022-06-08">2022-06-08</option>
                        <option value="2022-06-09">2022-06-09</option>
                        <option value="2022-06-10">2022-06-10</option>
                        <option value="2022-06-11">2022-06-11</option>
            </select>
            </div> 
            <div class ="form-group">
            <label>Kategori</label>
					  <select name="kategori" class="form-control" required="" autofocus="" data-errormessage-value-missing='kategori masih kosong'>
						<option value="">--Pilih--</option>
						<option value="umum">Umum</option>
						<option value="remaja">Remaja</option>
						<option value="ibu_hamil">Ibu hamil</option>
            </select>
            </div>
            <div class ="form-group">
            <label>Jenis Vaksin</label>
					  <select name="jenis_vaksin" class="form-control" required="" autofocus="" data-errormessage-value-missing='jenis vaksin masih kosong'>
						<option value="">--Pilih--</option>
						<option value="moderna">Moderna</option>
						<option value="sinovac">Sinovak</option>
						<option value="astrazeneca">AstraZeneca</option>
            <option value="pfizer">Pfizer</option>
            </select>
            </div>
            <div class ="form-group">
            <div><label for="vaksin_ke" class="form-control" required="" autofocus="" data-errormessage-value-missing=' vaksin ke masih kosong' >Vaksin Ke </label>
                <label><input type="radio" name="vaksin_ke" value="satu"> Satu</label> &nbsp; &nbsp;
                <label><input type="radio" name="vaksin_ke" value="dua"> Dua</label>&nbsp;&nbsp;
                <label><input type="radio" name="vaksin_ke" value="tiga"> Tiga</label>
            </div>
            </div>
            <br>
            <div>
            <input type="submit" name="submit" class="btn btn-warning" value="Daftar Sekarang">
                <a href="halaman.php?page=pasien" class="btn btn-danger">Batal</a>
            </div>
          </form>

</div>
</div>
</div>
</div>             
</div>
</div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="#">Creative Tim</a>,user pendaftaran vaksinasi
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="user/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="user/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="user/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="user/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="user/assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="user/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="user/assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="user/assets/js/demo.js"></script>

</html>
