
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
                    <li>
                        <a class="nav-link" href="vaksin_user.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Daftar Vaksinasi</p>
                        </a>
                    </li>
                    </li>
                    <li class="nav-item active">
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
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h2 class="card-title">Data Pendaftaran Vaksinasi</h2>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>ID Pasien</th>
                                            <th>Nama Pasien</th>
                                            <th>NIK</th>
                                            <th>NO HP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * from pendaftaran") or die(mysqli_error($koneksi));
                                        //melakukan perulangan while dengan dari dari query $sql
                                        while($data = mysqli_fetch_array($sql)){
                                          ?>
                                          <tr>
                                          <td><?php echo $no++; ?></td>
                                          <td><?php echo $data['id_daftar']; ?></td>
                                          <td><?php echo $data['nama_pasien']; ?></td>
                                          <td><?php echo $data['nik']; ?></td>
                                          <td><?php echo $data['no_hp']; ?></td>
                                          <td>
                                          <a href ="det.php?id= <?php echo $data['id_daftar'] ?>" class="btn btn-warning btn-sm">Detail</a>
                                          <a href="halaman.php?page=detail&id=<?php echo $data['id_daftar'] ?>" class="btn btn-success btn-sm">Detail</a>                                        </td>
                                        </tr>
                                        <?php 
                                      }
                                      ?>
                                      </table>
                                      </tbody>
                                    </table>
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
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
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
