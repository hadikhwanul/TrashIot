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
<!-- Main content -->
<section id="content-page" class="content-page">
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="edit-profil" class="btn btn-sm btn-info float-right"><i class="fas fa-edit"></i> Edit
                    Profil</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-sm-12">
                <?php if (!empty($_GET['notif'])) {?>
                <?php if ($_GET['notif']=="editberhasil") {?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Selamat !!!</strong> Data berhasil diubah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } ?>
                <?php } ?>
                <table class="table mb-0">
                    <tbody>
                        <tr>
                            <td colspan="2"><i class="fas fa-user-circle"></i> <strong>PROFIL<strong></td>
                        </tr>
                        <tr>
                            <td width="20%"><strong>Foto<strong></td>
                            <td width="80%"><img src="images/gambar-user/<?php echo $foto; ?>" class="img-fluid"
                                    width="200px;"></td>
                        </tr>
                        <tr>
                            <td width="20%"><strong>Nama<strong></td>
                            <td width="80%"><?php echo $nama; ?></td>
                        </tr>
                        <tr>
                            <td width="20%"><strong>Email<strong></td>
                            <td width="80%"><?php echo $email;?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
</section>
<!-- /.content -->