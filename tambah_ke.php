<?php
 session_start();

 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['level']==""){
  header("location:login_admin.php?pesan=gagal");
 }
?>
<h3>Tambah Dosis Vaksin</h3>
<div class="panel panel-primary">
<div class="panel-heading">
    Tambah Dosis Vaksin
</div>
<div class="panel-body label-align"  >
    <div class="row">
        <div class="col-md-6 ">
            <form action ="aksi_ke.php" method ='POST'>
                <div class="form-group">
                <label >Vaksin Ke</label>
                <input class="form-control" name ='vaksin_ke' type ="text" />
                </div>  
                <div>
                <button type="submit" name='simpan'class="btn btn-warning">Simpan</button>
                <a href="halaman.php?page=vaksin_ke" class="btn btn-primary btn-sm">Batal</a>
            </div>
            </form>
    </div>
</div>
</div> 
</div> 
</div>