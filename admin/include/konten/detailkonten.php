<!-- PHP untuk mendapatkan data konten-->
<?php
  if (isset($_GET['data'])) {
      $id_konten = $_GET['data'];
      $_SESSION['id_konten'] = $id_konten;
      //get data konten
      $sql_kon = " SELECT  `judul_konten`, 
                        `sinopsis`
                FROM `konten`
                WHERE `id_konten` = '$id_konten' ";
      $query_kon = mysqli_query($koneksi, $sql_kon);
      while ($data_kon = mysqli_fetch_row($query_kon)) {
          $judul = $data_kon[0];
          $sinopsis = $data_kon[1];
      }
  }
?>
<!-- PHP untuk mendapatkan data konten-->
<!-- Main content -->
<section id="content-page" class="content-page">
  <div class="card">
    <div class="card-header">
      <div class="card-tools">
        <a href="konten" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table mb-0">
        <tbody>

          <tr>
            <td width="20%"><strong>Judul<strong></td>
            <td width="80%"><?php echo $judul; ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Sinopsis<strong></td>
            <td width="80%"><?php echo $sinopsis; ?></td>
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