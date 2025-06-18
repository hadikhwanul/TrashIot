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
    <div class="col-sm-12">
      <?php if ((!empty($_GET['notif']))||(!empty($_GET['jenis']))) {?>
      <?php if ($_GET['notif']=="tambahkosong") {?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Mohon Maaf !!!</strong> data <?php echo $_GET['jenis'];?> wajib di isi
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } ?>
      <?php } ?>
    </div>
    <form class="form-horizontal" action="konfirmasi-tambah-konten" method="POST">
      <div class="card-body">
        <div class="form-group row">
          <label for="nim" class="col-sm-3 col-form-label">Judul</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="judul_konten" id="nim" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="sinopsis" class="col-sm-3 col-form-label">Sinopsis</label>
          <div class="col-sm-7">
            <textarea class="form-control" name="sinopsis_konten" id="editor1" rows="12"></textarea>
          </div>
        </div>
        <div class="col-sm-12">
          <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
        </div>
      </div>
  </div>

  </div>

  </form>
  </div>
  <!-- /.card -->
</section>
<!-- /.content -->