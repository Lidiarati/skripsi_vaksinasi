<?php 
include('koneksi.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login_admin.php?pesan=gagal");
}
$sql = mysqli_query($koneksi, "SELECT * FROM siswa
inner join kategori on siswa.id_kategori = kategori.id_kategori
inner join jenis_vaksin on siswa.id_jenis = jenis_vaksin.id_jenis
inner join vaksin_ke on siswa.id_ke = vaksin_ke.id_ke")or die(mysqli_error($koneksi));

?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <h3><i class="fa-solid fa-hospital-user  mr-2" class ="btn btn-primary"></i>DAFTAR PASIEN </h3><hr>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-dark " id="dataTables-example" >
                                    <thead class="align-middle">
                                        <tr>
                                        <th>No.</th>
                                        <th>NIK</th>
                                        <th>Nama Pasien</th>
                                        <th>Email</th>
                                        <th>Lahir</th>
                                        <th>Kelamin</th>
                                        <th>Kategori</th>
                                        <th>Jenis vaksin</th>
                                        <th>Dosis Vaksin</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                        //melakukan perulangan while dengan dari dari query $sql
                                        while($data = mysqli_fetch_array($sql)){
                                          ?>
                                          <tr>
                                          <td><?php echo $no++; ?></td>
                                          <td><?php echo $data['nis']; ?></td>
                                          <td><?php echo $data['nama']; ?></td>
                                          <td><?php echo $data['email']; ?></td>
                                          <td><?php echo $data['tgl_lahir']; ?></td>
                                          <td><?php echo $data['kelamin']; ?></td>
                                          <td><?php echo $data['kategori']; ?></td>
                                          <td><?php echo $data['jenis_vaksin']; ?></td>
                                          <td><?php echo $data['vaksin_ke']; ?></td>
                                          <td><?php echo $data['alamat']; ?></td>
                                          <td>
                                           <a href="halaman.php?page=edit&id_siswa=<?php echo $data['id_siswa'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="delete.php?id_siswa=<?php  echo $data['id_siswa'] ?>"onclick ="return confirm ('anda yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
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
