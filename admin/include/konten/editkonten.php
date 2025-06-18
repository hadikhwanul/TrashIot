<!-- PHP untuk mendapatkan data konten-->
<?php
  if (isset($_GET['data'])) {
      $id_konten = $_GET['data'];
      $_SESSION['id_konten'] = $id_konten;
      //get data konten
      $sql_kon = " SELECT `judul_konten`, 
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
  <div class="card card-info">
    <div class="card-header">
      <div class="card-tools">
        <a href="konten" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    </br></br>
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
    <form class="form-horizontal" action="konfirmasi-edit-konten" method="POST">
      <div class="card-body">
        <div class="form-group row">
          <label for="nim" class="col-sm-3 col-form-label">Judul</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="judul_konten" id="nim" value="<?php echo $judul; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="sinopsis" class="col-sm-3 col-form-label">Sinopsis</label>
          <div class="col-sm-7">
            <textarea class="form-control" name="sinopsis_konten" id="editor1"
              rows="12"><?php echo $sinopsis; ?></textarea>
          </div>
        </div>
        <div class="col-sm-12">
          <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
        </div>
      </div>
  </div>
  </div>
  <!-- /.card-body -->
  </form>
  </div>
  <!-- /.card -->
</section>
<!-- /.content -->