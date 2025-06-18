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

    <div class="card card-info">
        <div class="card-header">
            <div class="card-tools">
                <a href="galeri" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i>
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
                Maaf gambar, judul, dan sinopsis wajib di isi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
        <form class="form-horizontal" action="konfirmasi-edit-galeri" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <label for="foto" class="col-sm-12 col-form-label"><span class="text-info">
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-3 col-form-label">Gambar</label>
                    <div class="col-sm-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02"><?php echo $gambar; ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="judul_gambar" id="nama"
                            value="<?php echo $judul; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-7">
                        <input type="text" id="tanggal" class="form-control" name="tanggal"
                            value="<?php echo $tanggal ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Sinopsis</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="sinopsis_gambar" id="editor1"
                            rows="12"><?php echo $sinopsis; ?></textarea>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i>
                            Simpan</button>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

        </form>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->