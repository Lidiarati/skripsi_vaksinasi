<?php
 include('koneksi.php');
 if(!isset($_GET['id_jadwal'])){
    header('location:login_admin.php?pesan=gagal');}
 
    $id = $_GET ['id_jadwal'];
    $sql = "SELECT * FROM jadwal1 WHERE id_jadwal=$id";
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
            <form  action ="halaman.php?page=edit_jadwal&id_jadwal= <?php echo $id; ?>" method ='POST'>
            <div class="form-group">
        
                <div class="form-group">
                <label>Sesi</label>
                <input type="hidden" name="id_jadwal" value="<?php echo $jadwal['id_jadwal'] ?>">
                <input class="form-control" name ='sesi' type='text'  value="<?php echo $jadwal['sesi']; ?>"> 
                </div>
                
                <div class="form-group">
                <label>Antrian</label>
                <input class="form-control" name ='antrian' value="<?php echo $jadwal['antrian']; ?>">
                </div>
                <div class="form-group">
                <label>Jam </label>
                <input class="form-control"type='text' name ='jam'value="<?php echo $jadwal['jam']; ?>"> 
                </div>
                <div class="form-group">
                <label>Tanggal </label>
                <input class="form-control"type='text' name ='tanggal'value="<?php echo $jadwal['tanggal']; ?>"> 
                </div>
                <div class="form-group">
                <label>Tempat </label>
                <input class="form-control"type='text' name ='tempat'value="<?php echo $jadwal['tempat']; ?>"> 
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
    $hari = $_POST ['sesi'];
    $jam_buka = $_POST ['antrian'];
    $jam_tutup= $_POST ['jam'];
    $no_antrian = $_POST ['tanggal'];
    $lokasi_vaksin =$_POST ['tempat'];

    $update = mysqli_query ($koneksi," UPDATE jadwal1 SET sesi='$hari', antrian='$jam_buka', jam='$jam_tutup', tanggal='$no_antrian', tempat='$lokasi_vaksin' WHERE id_jadwal='$id'") or die(mysqli_error($koneksi));
    if($update){
        echo '<script>alert("Berhasil menyimpan data."); document.location="halaman.php?page=jadwal";</script>';
    }else{
        echo '<div class="alert alert-warning"> Gagal melakukan proses edit data.</div>';
    }

    
}
?>

