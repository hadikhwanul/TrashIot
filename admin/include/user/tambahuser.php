<!-- Main content -->
<section section id="content-page" class="content-page">
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
    <form class="form-horizontal" action="konfirmasi-tambah-user" method="POST" enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group row">
          <label for="foto" class="col-sm-12 col-form-label"><span class="text-info"><i class="fas fa-user-circle"></i>
              <u>Data User</u></span></label>
        </div>
        <div class="form-group row">
          <label for="foto" class="col-sm-3 col-form-label">Foto </label>
          <div class="col-sm-7">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="foto" id="inputGroupFile02">
              <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama" id="nama" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="email" id="email" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="username" class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="username" id="username" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="password" id="password" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="level" class="col-sm-3 col-form-label">Level</label>
          <div class="col-sm-9">
            <select class="form-control" id="jurusan" name="level">
              <option value="superadmin">superadmin</option>
              <option value="admin">admin</option>
            </select>
          </div>
          <div class="col-sm-12"><br>
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<br>