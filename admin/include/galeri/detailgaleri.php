<!-- PHP untuk mendapatkan data galeri-->
<?php
  if (isset($_GET['data'])) {
      $id_galeri = $_GET['data'];
      $_SESSION['id_galeri'] = $id_galeri;
      //get data galeri
      $sql_gal = " SELECT `gambar`, 
                          `judul_gambar`, 
                          `sinopsis_gambar`,
                          DATE_FORMAT(`tanggal`, '%d-%m-%Y') 
                      FROM `galeri`
                WHERE `id_galeri` = '$id_galeri' ";
      $query_gal = mysqli_query($koneksi, $sql_gal);
      while ($data_gal = mysqli_fetch_row($query_gal)) {
          $gambar = $data_gal[0];
          $judul = $data_gal[1];
          $sinopsis = $data_gal[2];
          $tanggal = $data_gal[3];
      }
  }
?>
<!-- PHP untuk mendapatkan data galeri-->
<!-- Main content -->
<section id="content-page" class="content-page">
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="galeri" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i>
                    Kembali</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table mb-0">
                <tbody>
                    <tr>
                        <td width="20%"><strong>Foto<strong></td>
                        <td width="80%"><img src="images/gambar-galeri/<?php echo $gambar; ?>" class="img-fluid"
                                width="200px;"></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Judul<strong></td>
                        <td width="80%"><?php echo $judul; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Tanggal<strong></td>
                        <td width="80%"><?php echo  $tanggal ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Sinopsis<strong></td>
                        <td width="80%"><?php echo  $sinopsis ?></td>
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