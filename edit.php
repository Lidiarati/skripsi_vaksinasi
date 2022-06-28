<?php
    session_start();  
    include('koneksi.php');
    if(!isset($_GET['id_siswa'])){
       header('Location: halaman.php?page=pasien');}

    $id_siswa=$_GET['id_siswa'];
    $qry = mysqli_query($koneksi, "SELECT * FROM siswa 
    inner join kategori on siswa.id_kategori = kategori.id_kategori
    inner join jenis_vaksin on siswa.id_jenis = jenis_vaksin.id_jenis
    inner join vaksin_ke on siswa.id_ke = vaksin_ke.id_ke where id_siswa = '".$id_siswa."'");
    $data_siswa=mysqli_fetch_array($qry);
?>

<!DOCTYPE html>
<html lang="en">

<head>
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
   <form  action ="" method ='POST'>
 <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>NIS</label>
                                    <input
                                    type="number"
                                    class="form-control"
                                    name="nis"
                                    placeholder="NIS"
                                    value="<?=$data_siswa['nis']?>"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" placeholder="Name" value="<?=$data_siswa['nama']?>" name="nama" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" placeholder="Name" value="<?=$data_siswa['alamat']?>" name="alamat" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    value="<?=$data_siswa['email']?>"
                                    required
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" value="<?=$data_siswa['tgl_lahir']?>" name="tgl_lahir" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kelamin</label>
                                    <select class="form-control" name="kelamin" required/>
                                        <option value="<?=$data_siswa['kelamin']?>"><?=$data_siswa['kelamin']?></option>
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
                            <option value="<?=$data_siswa['id_kategori']?>"><?=$data_siswa['kategori']?></option>
                            <?php
                                $qry5=mysqli_query($koneksi, "select * from kategori");
                                while($data_kategori1=mysqli_fetch_array($qry5)){
                                    echo '<option value="'.$data_kategori1['id_kategori'].'">'.$data_kategori1['kategori'].'</option>';
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
                            <option value="<?=$data_siswa['id_jenis']?>"><?=$data_siswa['jenis_vaksin']?></option>
                            <?php
                                $qry5=mysqli_query($koneksi, "select * from jenis_vaksin");
                                while($data_jenis1=mysqli_fetch_array($qry5)){
                                    echo '<option value="'.$data_jenis1['id_jenis'].'">'.$data_jenis1['jenis_vaksin'].'</option>';
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
                            <option value="<?=$data_siswa['id_ke']?>"><?=$data_siswa['vaksin_ke']?></option>
                            <?php
                                $qry5=mysqli_query($koneksi, "select * from vaksin_ke");
                                while($data_ke1=mysqli_fetch_array($qry5)){
                                    echo '<option value="'.$data_ke1['id_ke'].'">'.$data_ke1['vaksin_ke'].'</option>';
                                }
                            ?>
                        </select>
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
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $kelamin = $_POST['kelamin'];
        $kategori = $_POST['kategori'];
        $jenis = $_POST['jenis_vaksin'];
        $ke = $_POST['vaksin_ke'];
        $alamat = $_POST['alamat'];
        
        
        $query = mysqli_query($koneksi, "update siswa set 
        nis = '".$nis."',
        nama = '".$nama."',
        email = '".$email."',
        kelamin = '".$kelamin."',
        tgl_lahir = '".$tgl_lahir."',
        id_kategori = '".$kategori."',
        id_jenis = '".$jenis."',
        id_ke = '".$ke."',
        alamat = '".$alamat."'
        where id_siswa= '".$id_siswa."'");
        if($query){
        echo '<script>alert("Berhasil Mengupdate Data."); document.location="halaman.php?page=pasien";</script>';
        }else{
            echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
      }
?>


