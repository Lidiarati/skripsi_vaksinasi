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
                    <h3><i class="fa-solid fa-hospital-user  mr-2" class ="btn btn-primary"></i>Kategori Vaksin</h3><hr>
                    <a href="halaman.php?page=tambah_kategori"class ="btn btn-primary">Tambah Kategori</a>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $sql = "SELECT * FROM kategori";
                                    $query = mysqli_query($koneksi, $sql);
                                    //$sql = mysqli_query($koneksi, "SELECT * from jadwal ORDER BY id_jadwal DESC") or die(mysqli_error($koneksi));
                                        //melakukan perulangan while dengan dari dari query $sql
                                        while($data = mysqli_fetch_array($query)){
                                    ?>
                                          <tr>
                                          <td><?php echo $no++; ?></td>
                                          <td><?php echo $data['kategori']; ?></td>
                                          <td>
                                           <a href="halaman.php?page=edit_kategori&id_kategori=<?php echo $data['id_kategori'];?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="delete_kategori.php?id_kategori=<?php echo $data['id_kategori']; ?>"class="btn btn-danger btn-sm">HAPUS</a>
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
