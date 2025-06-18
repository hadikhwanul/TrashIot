<!-- PHP untuk mendapatkan data User-->
<?php
  if (isset($_GET['data'])) {
      $id_user = $_GET['data'];
      $_SESSION['id_user'] = $id_user;
      //get data user
      $sql_us = " SELECT  `nama`, 
                        `email`, 
                        `username`,
                        `password`,
                        `level`,
                        `foto`
                FROM `user`
                WHERE `id_user` = '$id_user' ";
      $query_us = mysqli_query($koneksi, $sql_us);
      while ($data_us = mysqli_fetch_row($query_us)) {
          $nama = $data_us[0];
          $email = $data_us[1];
          $username = $data_us[2];
          $password = $data_us[3];
          $level = $data_us[4];
          $foto=$data_us[5];
      }
  }
?>
<!-- PHP untuk mendapatkan data User-->
<section id="content-page" class="content-page">
    <div class="card card-info">
        <div class="card-header">
            <div class="card-tools">
                <a href="profil" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i>
                    Kembali</a>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        </br>
        <div class="col-sm-10">
            <?php if ((!empty($_GET['notif']))||(!empty($_GET['nama']))) {?>
            <?php if ($_GET['notif']=="editkosong") {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Maaf data foto pegawai, nama, dan email wajib di isi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
        <form class="form-horizontal" action="konfirmasi-edit-profil" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <label for="foto" class="col-sm-12 col-form-label"><span class="text-info">
                            <i class="fas fa-user-circle"></i> <u>PROFIL USER</u></span></label>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-3 col-form-label">Foto Pegawai</label>
                    <div class="col-sm-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02"><?php echo $foto; ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $email ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="password" id="password" value="">
                        <span class="text-danger" style="font-weight:lighter;font-size:12px">
                            *Jangan diisi jika tidak ingin mengubah password</span>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->

</section>