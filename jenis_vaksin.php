<?php 
include('koneksi.php');
 session_start();

 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['level']==""){
  header("location:login_admin.php?pesan=gagal");
 }
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <h3><i class="fa-solid fa-hospital-user  mr-2" class ="btn btn-primary"></i>jenis Vaksin</h3><hr>
                    <a href="halaman.php?page=tambah_jenis"class ="btn btn-primary">Tambah Jenis Vaksin</a>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Vaksin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $sql = "SELECT * FROM jenis_vaksin";
                                    $query = mysqli_query($koneksi, $sql);
                                    //$sql = mysqli_query($koneksi, "SELECT * from jadwal ORDER BY id_jadwal DESC") or die(mysqli_error($koneksi));
                                        //melakukan perulangan while dengan dari dari query $sql
                                        while($data = mysqli_fetch_array($query)){
                                    ?>
                                          <tr>
                                          <td><?php echo $no++; ?></td>
                                          <td><?php echo $data['jenis_vaksin']; ?></td>
                                          <td>
                                           <a href="halaman.php?page=edit_jenis&id_jenis=<?php echo $data['id_jenis'];?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="delete_jenis.php?id_jenis=<?php echo $data['id_jenis']; ?>"class="btn btn-danger btn-sm">HAPUS</a>
                                          </td>
                                        </tr>
                                        <?php 
                                      }
                                      ?>
                                      </table>
                                      </tbody>
            </div>
       </div>
    </div>
   </div>
 </div>
