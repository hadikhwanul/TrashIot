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
  <div class="card">
    <div class="card-header">
      <div class="card-tools">
        <a href="user" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table mb-0">
        <tbody>
          <tr>
            <td colspan="2"><i class="fas fa-user-circle"></i> <strong>Data User<strong></td>
          </tr>
          <tr>
            <td><strong>Foto User<strong></td>
            <td><img src="images/gambar-user/<?php echo $foto ?>" class="img-fluid" width="200px;"></td>
          </tr>
          <tr>
            <td width="20%"><strong>Nama<strong></td>
            <td width="80%"><?php echo $nama; ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Email<strong></td>
            <td width="80%"><?php echo $email; ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Level<strong></td>
            <td width="80%"><?php echo $level; ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Username<strong></td>
            <td width="80%"><?php echo $username; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">&nbsp;</div>
  </div>
  <!-- /.card -->
</section>
<!-- /.content -->