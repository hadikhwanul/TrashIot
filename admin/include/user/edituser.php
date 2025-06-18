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
          $foto = $data_us[5];
      }
  }
?>
<!-- PHP untuk mendapatkan data User-->
<!-- Main content -->
<section id="content-page" class="content-page">
  <div class="card card-info">
    <div class="card-header">
      <div class="card-tools">
        <a href="user" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i>
          Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    </br>
    <div class="col-sm-10">
      <?php if ((!empty($_GET['notif']))||(!empty($_GET['judul']))) {?>
        <?php if ($_GET['notif']=="editkosong") {?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Maaf judul dan sinopsis wajib di isi
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <form class="form-horizontal" action="konfirmasi-edit-user" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group row">
          <label for="foto" class="col-sm-12 col-form-label">
            <span class="text-info"><i class="fas fa-user-circle"></i>
              <u>Data User</u>
            </span>
          </label>
        </div>

        <div class="form-group row">
          <label for="foto" class="col-sm-3 col-form-label">Foto </label>
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
            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="username" class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>">
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
        <div class="form-group row">
          <label for="level" class="col-sm-3 col-form-label">Level</label>
          <div class="col-sm-7">
            <select class="form-control" id="jurusan" name="level">
              <option value="superadmin" <?php if ($level=="superadmin") { ?> selected <?php } ?>>superadmin</option>
              <option value="admin" <?php if ($level=="admin") { ?> selected <?php } ?>>admin</option>
            </select>
          </div>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer -->
      </div>
      <div class="card-footer py-3 d-flex flex-row align-items-center justify-content-between">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-sm btn-info float-right"><i class="fas fa-simpan"></i>
            Simpan
          </button>
        </div>
      </div>

    </form>
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->