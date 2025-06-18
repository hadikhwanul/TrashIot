<!-- PHP untuk mendapatkan data monitor-->
<?php
  
      $sql_mon = " SELECT `foto`, 
                         `nama_tps`, 
                         `alamat`        
                  FROM   `tps`";
      $query_mon = mysqli_query($koneksi, $sql_mon);
      while ($data_mon = mysqli_fetch_row($query_mon)) {
          $foto = $data_mon[0];
          $nama = $data_mon[1];
          $alamat = $data_mon[2];
      }
?>
<!-- PHP untuk mendapatkan data monitor-->
<!-- Main content -->
<section id="content-page" class="content-page">

  <div class="card card-info">
    <div class="card-header">
      <div class="card-tools">
        <a href="monitor" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i>
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
    <form class="form-horizontal" action="konfirmasi-edit-monitor" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group row">
          <label for="foto" class="col-sm-12 col-form-label"><span class="text-info">
        </div>
        <div class="form-group row">
          <label for="foto" class="col-sm-3 col-form-label">Foto</label>
          <div class="col-sm-7">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="foto_tps" id="inputGroupFile02">
              <label class="custom-file-label" for="inputGroupFile02">Choose File</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama TPS</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="nama_tps" id="nama" value="<?php echo $nama; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="alamat" id="nama" value="<?php echo $alamat; ?>">
          </div>
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </form>
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->