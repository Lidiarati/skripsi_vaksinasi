<?php
 session_start();

 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['level']==""){
  header("location:login_admin.php?pesan=gagal");
 }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>pendaftaran vaksinisasi | ADMIN</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Halaman Admin</A></a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">Sistem Pendaftaran Vaksinasi Online &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation" style="background-color:#EE82EE;">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="halaman.php?page=akun" ><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                      <li>
                        <a  href="halaman.php?page=akun"><i class="fa fa-desktop fa-3x"></i> Data Akun</a>
                    </li>
                    <li>
                        <a  href="halaman.php?page=pasien"><i class="fa fa-qrcode fa-3x"></i> Data Pasien</a>
                    </li>
                      <li  >
                        <a  href="halaman.php?page=jadwal"><i class="fa fa-table fa-3x"></i> Data Jadwal</a>
                    </li>
                    <li>
                        <a href="halaman.php?page=vaksin"><i class="fa fa-sitemap fa-3x"></i> Data Vaksin<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="halaman.php?page=kategori">Kategori Vaksin</a>
                            </li>
                            <li>
                                <a href="halaman.php?page=jenis_vaksin">Jenis Vaksin</a> 
                            </li>
                            <li>
                                <a href="halaman.php?page=vaksin_ke">Vaksin Ke</a> 
                            </li>
                        </ul>
                      </li>  		
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     
                    <?php
                    $queries = array();
                    parse_str($_SERVER['QUERY_STRING'], $queries);
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    switch ($queries['page']) {
                        case 'dashboard':
                            # code...
                            include 'dashboard.php';
                            break;
                        case 'pasien':
                            # code...
                            include 'pasien.php';
                            break;
                        case 'akun':
                            # code...
                            include 'akun.php';
                            break;
                        case 'jadwal':
                            include 'jadwal.php';
                            break;
                        case 'tambah_jadwal':
                            include 'tambah_jadwal.php';
                            break;
                        case 'edit_jadwal';
                            include 'edit_jadwal.php';
                            break;
                        case 'edit':
                            include 'edit.php';
                            break;
                        case 'detail':
                            include 'detail.php';
                            break;
                        case 'kategori':
                            include 'kategori.php';
                            break;
                        case 'jenis_vaksin':
                            include 'jenis_vaksin.php';
                            break;
                        case 'vaksin_ke':
                            include 'vaksin_ke.php';
                            break;
                        case 'edit_kategori':
                            include 'edit_kategori.php';
                            break;
                        case 'edit_jenis':
                            include 'edit_jenis.php';
                            break;
                        case 'edit_ke':
                            include 'edit_ke.php';
                            break;
                        case 'edit_akun':
                            include 'edit_akun.php';
                            break;
                        case 'tambah_kategori':
                            include 'tambah_kategori.php';
                            break;
                        case 'tambah_jenis':
                            include 'tambah_jenis.php';
                            break;
                        case 'tambah_ke':
                            include 'tambah_ke.php';
                            break;
    
                        }
            ?>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Include library Bootstrap Datepicker -->
    <script src="plugin/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Include File JS Custom (untuk fungsi Datepicker) -->
    <script src="js/custom.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
