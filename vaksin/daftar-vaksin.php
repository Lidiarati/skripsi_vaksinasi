
<?php
  session_start();  
  
  if($_SESSION['login']!=true){
    header('Location: ./login.php');
  }
  $id_akun=$_SESSION['id_akun'];
  include '../koneksi.php';

  $qry=mysqli_query($koneksi,"select * from akun where id='".$id_akun."'");
  $data_akun=mysqli_fetch_array($qry);

  $qry3 = mysqli_query($koneksi,"select * from siswa where email='".$data_akun['email']."'");
  $cek_daftar = mysqli_num_rows($qry3);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/vaccine.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin | Daftar Vaksin
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
</head>

<body class="" style="background-color: rgb(194, 194, 194);">
  <div class="content">
    <div class="row mt-5">
        <div class="col-md-3"></div>
        <?php
          if($cek_daftar>0){
        ?>
        <div class="col-md-6">
            <div class="card card-user">
              <div class="card-header">
                <center>
                  <h5 class="card-title">Anda Sudah Terdaftar !</h5>
                  <a href="dashboard.php" class="btn btn-danger btn-round mb-4">Kembali</a>
                </center>
              </div>
            </div>
        </div>
        <?php
          }else{
        ?>
        <div class="col-md-6">
            <div class="card card-user">
              <div class="card-header">
                <a href="dashboard.php" class="btn btn-danger btn-round">Batal</a>
                <h5 class="card-title">Daftar Vaksin</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input
                          type="text"
                          class="form-control"
                          disabled=""
                          placeholder="Nama"
                          value="<?=$data_akun['nama']?>"
                          name="nama_siswa"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" placeholder="Email" value="<?=$data_akun['email']?>" name="email_siswa" required disabled/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" placeholder="NIK" name="nis_siswa" maxlength="16" onkeypress="return event.charCode >= 48 && event.charCode <=57" required/>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                      <label> Alamat</label>
                      <textarea type="text" name="alamat" class="form-control"rows="4" required="" autofocus="" data-errormessage-value-missing='Alamat masih kosong'></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kelamin</label>
                          <select class="form-control" name="kelamin_siswa" required/>
                            <option value="">Pilih Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori" required/>
                          <option value="">Pilih kategori</option>
                          <?php
                            $qry1=mysqli_query($koneksi, "select * from kategori");
                            while($data_sekolah=mysqli_fetch_array($qry1)){
                              echo '<option value="'.$data_sekolah["id_kategori"].'">'.$data_sekolah["kategori"].'</option>';    
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Vaksin</label>
                        <select class="form-control" name="jenis_vaksin" required/>
                          <option value="">Pilih Jenis Vaksin</option>
                          <?php
                            $qry1=mysqli_query($koneksi, "select * from jenis_vaksin");
                            while($data_sekolah=mysqli_fetch_array($qry1)){
                              echo '<option value="'.$data_sekolah["id_jenis"].'">'.$data_sekolah["jenis_vaksin"].'</option>';    
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Dosis Vaksin</label>
                        <select class="form-control" name="vaksin_ke" required/>
                          <option value="">Pilih Dosis Vaksin</option>
                          <?php
                            $qry1=mysqli_query($koneksi, "select * from vaksin_ke");
                            while($data_sekolah=mysqli_fetch_array($qry1)){
                              echo '<option value="'.$data_sekolah["id_ke"].'">'.$data_sekolah["vaksin_ke"].'</option>';    
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tanggal Vaksin</label>
                        <select class="form-control" name="jadwal1" required/>
                          <option value="">Pilih Tanggal Vaksin</option>
                          <?php
                            $qry1=mysqli_query($koneksi, "select * from jadwal1");
                            while($data_sekolah=mysqli_fetch_array($qry1)){
                              echo '<option value="'.$data_sekolah["id_jadwal"].'">'.$data_sekolah["tanggal"].'</option>';    
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tanggal Vaksin</label>
                        <select class="form-control" name="jadwal1" required/>
                          <option value="">Pilih Lokasi Vaksin</option>
                          <?php
                            $qry1=mysqli_query($koneksi, "select * from jadwal1");
                            while($data_sekolah=mysqli_fetch_array($qry1)){
                              echo '<option value="'.$data_sekolah["id_jadwal"].'">'.$data_sekolah["tempat"].'</option>';    
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input
                          type="date"
                          class="form-control"
                          placeholder="Tanggal Lahir"
                          name="tgl_lahir_siswa"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name="submit">Daftar Vaksin</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
        <?php
          }
        ?>
        
        <div class="col-md-3"></div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./dist/sweetalert2.all.min.js"></script>
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
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
        $nama = $data_akun['nama'];
        $email = $data_akun['email'];
        $nis = $_POST['nis_siswa'];
        $kelamin = $_POST['kelamin_siswa'];
        $kategori = $_POST['kategori'];
        $jenis = $_POST['jenis_vaksin'];
        $ke = $_POST['vaksin_ke'];
        $jadwal = $_POST['jadwal1'];
        $alamat = $_POST['alamat'];
        $lahir = $_POST['tgl_lahir_siswa'];
        
        date_default_timezone_set('Asia/Jakarta');
		    $date = date("l, d-M-Y H:i:s");

        $ceknis=mysqli_query($koneksi,"select * from siswa where nis = '".$nis."'");
        if(mysqli_num_rows($ceknis)<1){
          $query = mysqli_query($koneksi, "insert into siswa (nis,nama,tgl_lahir,kelamin,email,tgl_daftar,id_kategori,id_jenis,id_ke,id_jadwal,alamat) value
          ('".$nis."',
            '".$nama."',
            '".$lahir."',
            '".$kelamin."',
            '".$email."',
            '".$date."',
            '".$kategori."',
            '".$jenis."',
            '".$ke."',
            '".$jadwal."',
            '".$alamat."')");
          if($query){
            echo "<script>Swal.fire({
              icon: 'success',
              title: 'Daftar Berhasil',
              text: 'Mantap !'})
              setTimeout(function(){ 
                window.location.href = 'dashboard.php';
              }, 3000);       
              </script>";
          }else{
            echo "<script>Swal.fire({
              icon: 'error',
              title: 'Daftar Gagal',
              text: 'Coba Lagi'})
              </script>";
          }
        }else{
          echo "<script>Swal.fire({
            icon: 'error',
            title: 'NIS atau Email sudah terdaftar',
            text: 'Coba Lagi'})
            </script>";
        }
      }
?>


