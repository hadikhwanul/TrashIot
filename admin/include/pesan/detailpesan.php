<!-- PHP untuk mendapatkan data konten-->
<?php
  if (isset($_GET['data'])) {
      $id_pesan = $_GET['data'];
      $_SESSION['id_pesan'] = $id_pesan;
      //get data konten
      $sql_pes = " SELECT `id_pesan`, 
                          `subject`,
                          `nama`,
                          `email`,
                          `pesan`,
                          DATE_FORMAT(`tanggal`, '%d-%m-%Y %H:%i')
                    FROM `pesan`
                WHERE `id_pesan` = '$id_pesan' ";
      $query_pes = mysqli_query($koneksi, $sql_pes);
      while ($data_pes = mysqli_fetch_row($query_pes)) {
          $id_pesan = $data_pes[0];
          $subject = $data_pes[1];
          $nama = $data_pes[2];
          $email = $data_pes[3];
          $pesan = $data_pes[4];
          $tanggal = $data_pes[5];
      }
  }
?>
<!-- PHP untuk mendapatkan data konten-->
<!-- Main content -->
<section id="content-page" class="content-page">
  <div class="card">
    <div class="card-header">
      <div class="card-tools">
        <a href="pesan" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table mb-0">
        <tbody>

          <tr>
            <td width="20%"><strong>Subject<strong></td>
            <td width="80%"><?php echo $subject; ?></td>
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
            <td width="20%"><strong>Pesan<strong></td>
            <td width="80%"><?php echo $pesan; ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Tanggal<strong></td>
            <td width="80%"><?php echo $tanggal; ?></td>
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