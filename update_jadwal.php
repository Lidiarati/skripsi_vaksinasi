<?php

if(isset($_POST['submit'])){
    $id = ['id_jadwal'];
    $hari = $_POST ['hari'];
    $jam_buka = $_POST ['jam_buka'];
    $jam_tutup= $_POST ['jam_tutup'];
    $no_antrian = $_POST ['no_antrian'];

    $update = " UPDATE jadwal SET hari='$hari', jam_buka='$jam_buka', jam_tutup='$jam_tutup', no_antrian='$no_antrian' WHERE id_jadwal='$id'";
    $query = mysqli_query($koneksi, $update);
    if($query){
        echo '<script>alert("Berhasil menyimpan data."); document.location="halaman.php?page=jadwal";</script>';
    }else{
        echo '<div class="alert alert-warning"> Gagal melakukan proses edit data.</div>';
    }

    
}
?>