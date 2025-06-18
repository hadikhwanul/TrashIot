<!-- PHP Hapus data dan Cari Data user-->
<?php
  if ((isset($_GET['aksi']))&&(isset($_GET['data']))) {
      if ($_GET['aksi']=='hapus') {
          $id_user = $_GET['data'];
          //hapus user
          $sql_dh = "DELETE FROM `user` WHERE `id_user` = '$id_user'";
          mysqli_query($koneksi, $sql_dh);
      }
  }
  if (isset($_POST["katakunci"])) {
      $katakunci_user = $_POST["katakunci"];
      $_SESSION['katakunci_user'] = $katakunci_user;
  }
  if (isset($_SESSION['katakunci_user'])) {
      $katakunci_user = $_SESSION['katakunci_user'];
  } else {
      unset($_SESSION['katakunci_user']);
  }
?>
<!-- Penutup Hapus data dan Cari Data user-->
<!-- Main content -->
<section section id="content-page" class="content-page">
  <div class="card">
    <div class="card-header">
      <div class="card-tools">
        <a href="tambah-user" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah User</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="col-md-12">
        <form method="POST" action="#">
          <div class="row">
            <div class="col-md-4 bottom-10">
              <input type="text" class="form-control" id="kata_kunci" name="katakunci">
            </div>
            <div class="col-md-5 bottom-10">
              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
            </div>
          </div><!-- .row -->
        </form>
      </div><br>
      <div class="table table-responsive">
        <div class="col-sm-12">
          <?php if (!empty($_GET['notif'])) {?>
          <?php if ($_GET['notif']=="tambahberhasil") {?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat !!!</strong> Data berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php } elseif ($_GET['notif']=="editberhasil") {?>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Selamat !!!</strong> Data berhasil diubah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php } elseif ($_GET['notif']=="hapusberhasil") {?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php }?>
          <?php } ?>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th width="30%">Nama</th>
              <th width="30%">Email</th>
              <th width="20%">Level</th>
              <th width="15%">
                <center>Aksi</center>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
              $batas = 3;
              if (!isset($_GET['halaman'])) {
                  $posisi = 0;
                  $halaman = 1;
              } else {
                  $halaman = $_GET['halaman'];
                  $posisi = ($halaman-1) * $batas;
              }
              $sql_us = " SELECT  `id_user`, 
                                  `nama`, 
                                  `email`, 
                                  `level`
                          FROM    `user` ";
              if (!empty($katakunci_user)) {
                  $sql_us .= " WHERE `nama` LIKE '%$katakunci_user%' ";
              }
              $sql_us .=" ORDER BY `nama` limit $posisi, $batas";
              $query_us = mysqli_query($koneksi, $sql_us);
              $no = $posisi+1;
              while ($data_us = mysqli_fetch_row($query_us)) {
                  $id_user = $data_us[0];
                  $nama = $data_us[1];
                  $email = $data_us[2];
                  $level = $data_us[3]; ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $nama; ?></td>
              <td><?php echo $email; ?></td>
              <td><?php echo $level; ?></td>
              <td align="center">
                <a href="edit-user-data-<?php echo $id_user; ?>" class="btn btn-xs btn-info" title="Edit"><i
                    class="fas fa-edit"></i></a>
                <a href="detail-user-data-<?php echo $id_user; ?>" class="btn btn-xs btn-info" title="Detail"><i
                    class="fas fa-eye"></i></a>
                <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $nama; ?>?')) window.location.href ='user-data-<?php echo $id_user; ?>-mode-hapus_notif-hapusberhasil'"
                  class="btn btn-xs btn-warning"><i class="fas fa-trash" title="Hapus"></i></a>
              </td>
            </tr>
            <?php $no++;
              } ?>
          </tbody>
        </table>
      </div>

    </div>

  </div>
  <!-- /.card-body -->

  <!-- PHP untuk paginasi-->
  <?php
    //hitung jumlah semua data
    $sql_jum = "  SELECT  `id_user`, 
                          `nama`, 
                          `username`, 
                          `email`
                  FROM `user` ";
    if (!empty($katakunci_user)) {
        $sql_jum .= " WHERE `nama` LIKE '%$katakunci_user%'";
    }
    $sql_jum .= " ORDER BY `nama`";
    $query_jum = mysqli_query($koneksi, $sql_jum);
    $jum_data = mysqli_num_rows($query_jum);
    $jum_halaman = ceil($jum_data/$batas);
  ?>
  <!-- penutup PHP untuk paginasi-->
  <div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
      <?php
        if ($jum_halaman==0) {
            //tidak ada halaman
        } elseif ($jum_halaman==1) {
            echo "<li class='page-item'><a class='page-link' style='color: blue;'>1</a></li>";
        } else {
            $sebelum = $halaman-1;
            $setelah = $halaman+1;
            if ($halaman!=1) {
                echo "<li class='page-item'><a class='page-link' href='user-halaman-1' style='color: blue;'>Awal</a></li>";
                echo "<li class='page-item'><a class='page-link' href='user-halaman-$sebelum' style='color: blue;'>«</a></li>";
            }
            for ($i=1; $i<=$jum_halaman; $i++) {
                if ($i > $halaman - 5 and $i < $halaman + 5) {
                    if ($i!=$halaman) {
                        echo "<li class='page-item'><a class='page-link' href='user-halaman-$i' style='color: blue;'>$i</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' style='color: blue;'>$i</a></li>";
                    }
                }
            }
            if ($halaman!=$jum_halaman) {
                echo "<li class='page-item'><a class='page-link' href='user-halaman-$setelah' style='color: blue;'>»</a></li>";
                echo "<li class='page-item'><a class='page-link' href='user-halaman-$jum_halaman' style='color: blue;'>Akhir</a></li>";
            }
        }
        ?>
    </ul>
  </div>
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->