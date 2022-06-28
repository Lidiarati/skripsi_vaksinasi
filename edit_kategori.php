<?php
 include('koneksi.php');
 if(!isset($_GET['id_kategori'])){
    header('location:login_admin.php?pesan=gagal');}
 
    $id = $_GET ['id_kategori'];
    $sql = "SELECT * FROM kategori WHERE id_kategori=$id";
    $query = mysqli_query($koneksi, $sql);
    $jadwal = mysqli_fetch_array($query);
    
    // jika data yang di-edit tidak ditemukan
    if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan");
    }
    ?>
<div class="panel panel-primary"> 
<div class="panel-heading">
    <h1>Edit Jadwal </h1>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-8">
            <form  action ="halaman.php?page=edit_kategori&id_kategori= <?php echo $id; ?>" method ='POST'>
            <div class="form-group">
        
                <div class="form-group">
                <label>Hari</label>
                <input type="hidden" name="id_kategori" value="<?php echo $jadwal['id_kategori'] ?>">
                <input class="form-control" name ='kategori' type='text'  value="<?php echo $jadwal['kategori']; ?>"> 
                </div>
                <div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="halaman.php?page=pasien" class="btn btn-warning">Kembali</a>
				</div>
            </div>
        </form>
    </div>
</div>
</div> 
</div> 
</div>

<?php
if(isset($_POST['submit'])){
    //$id = ['id_jadwal'];
    $hari = $_POST ['kategori'];
    $update = mysqli_query ($koneksi," UPDATE kategori SET kategori='$hari' WHERE id_kategori='$id'") or die(mysqli_error($koneksi));
    if($update){
        echo '<script>alert("Berhasil menyimpan data."); document.location="halaman.php?page=kategori";</script>';
    }else{
        echo '<div class="alert alert-warning"> Gagal melakukan proses edit data.</div>';
    }

    
}
?>

