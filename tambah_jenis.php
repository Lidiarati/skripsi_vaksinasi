<?php
 session_start();

 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['level']==""){
  header("location:login_admin.php?pesan=gagal");
 }
?>
<h3>Tambah Jenis Vaksin</h3>
<div class="panel panel-primary">
<div class="panel-heading">
    Tambah Jenis Vaksin
</div>
<div class="panel-body label-align"  >
    <div class="row">
        <div class="col-md-6 ">
            <form action ="aksi_jenis.php" method ='POST'>
                <div class="form-group">
                <label >Jenis Vaksin </label>
                <input class="form-control" name ='jenis_vaksin' type ="text" />
                </div>  
                <div>
                <button type="submit" name='simpan'class="btn btn-warning">Simpan</button>
                <a href="halaman.php?page=jenis_vaksin" class="btn btn-primary btn-sm">Batal</a>
            </div>
            </form>
    </div>
</div>
</div> 
</div> 
</div>