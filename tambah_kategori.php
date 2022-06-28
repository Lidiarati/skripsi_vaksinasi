<?php
 session_start();

 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['level']==""){
  header("location:login_admin.php?pesan=gagal");
 }
?>
<h3>Tambah Kategori Vaksin</h3>
<div class="panel panel-primary">
<div class="panel-heading">
    Tambah Kategori vaksin
</div>
<div class="panel-body label-align"  >
    <div class="row">
        <div class="col-md-6 ">
            <form action ="aksi_kategori.php" method ='POST'>
                <div class="form-group">
                <label >Kategori </label>
                <input class="form-control" name ='kategori' type ="text" />
                </div>  
                <div>
                <button type="submit" name='simpan'class="btn btn-warning">Simpan</button>
                <a href="halaman.php?page=kategori" class="btn btn-primary btn-sm">Batal</a>
            </div>
            </form>
    </div>
</div>
</div> 
</div> 
</div>