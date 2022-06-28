<?php
 session_start();

 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['level']==""){
  header("location:login_admin.php?pesan=gagal");
 }
?>
<h3>Tambah Jadwal</h3>
<div class="panel panel-primary">
<div class="panel-heading">
    Tambah Jadwal
</div>
<div class="panel-body label-align"  >
    <div class="row">
        <div class="col-md-6 ">
            <form action ="aksi_jadwal.php" method ='POST'>
                <div class="form-group">
                <label >Sesi </label>
                <input class="form-control" name ='sesi' type ="text" />
                </div>  
                <div class="form-group">
                <label>Antrian</label>
                <input class="form-control" name ='antrian' />
                </div>
                <div class="form-group">
                <label>Waktu</label>
                <input class="form-control" name ='waktu' />
                </div>
                <div class="form-group">
                <label>Tanggal</label>
                <input class="form-control" name ='tanggal' />
                </div>
                <div class="form-group">
                <div class="form-group">
                <label>Tempat</label>
                <input class="form-control" name ='tempat' />
                </div>
                <div class="form-group">
				
                <div>
                <button type="submit" name='simpan'class="btn btn-warning">Simpan</button>
                <a href="halaman.php?page=jadwal" class="btn btn-primary btn-sm">Batal</a>
            </div>
            </form>
    </div>
</div>
</div> 
</div> 
</div>


<?php 
include_once("koneksi.php");
if ($_POST['simpan']){
    $hari = $_POST ['sesi'];
    $jam_buka = $_POST['antrian'];
    $jam_tutup =['waktu'];
    $no_antrian =['tanggal'];
    $simpan = $_POST ['tempat'];

    $simpan= "INSERT INTO jadwal1 (sesi, antrian, waktu, tanggal, tempat)
    VALUES ('$hari','$jam_buka','$jam_tutup','$no_antrian')";
    echo "User added successfully. <a href='halaman.php?page=tambah_jadwal'>View Users</a>";
}
?>