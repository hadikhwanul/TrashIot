<?php
  if ((isset($_GET['aksi']))&&(isset($_GET['data']))) {
      if ($_GET['aksi']=='hapus') {
          $id_galeri = $_GET['data'];
          //hapus galeri
          $sql_dh = "DELETE FROM `galeri` WHERE `id_galeri` = '$id_galeri'";
          mysqli_query($koneksi, $sql_dh);
      }
  }
  if (isset($_POST["katakunci"])) {
      $katakunci_galeri = $_POST["katakunci"];
      $_SESSION['katakunci_galeri'] = $katakunci_galeri;
  }
  if (isset($_SESSION['katakunci_galeri'])) {
      $katakunci_galeri = $_SESSION['katakunci_galeri'];
  } else {
      unset($_SESSION['katakunci_galeri']);
  }
?>
<!-- Penutup hapus data dan Cari Data galeri-->
<!-- Main content -->
<section id="content-page" class="content-page">
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="tambah-galeri" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah
                    Gambar</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-md-12">
                <form method="post" action="#">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                            <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                        </div>
                        <div class="col-md-5 bottom-10">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp;
                                Search</button>
                        </div>
                    </div><!-- .row -->
                </form>
            </div><br>
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
        <table class="table mb-0">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Gambar</th>
                    <th width="20%">Judul</th>
                    <th width="30%">Sinopsis</th>
                    <th width="15%">Tanggal</th>
                    <th width="25%">
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
            $halaman=$_GET['halaman'];
            $posisi=($halaman-1)* $batas;
        }
        $sql_gal =" SELECT `id_galeri`,
                           `gambar`, 
                           `judul_gambar`, 
                           `sinopsis_gambar`,
                           DATE_FORMAT(`tanggal`, '%d-%m-%Y') 
                    FROM `galeri`";
        if (!empty($katakunci_galeri)) {
            $sql_gal .= " WHERE `judul_gambar` LIKE '%$katakunci_galeri%' ";
        }
      $sql_gal .=" ORDER BY `judul_gambar` limit $posisi, $batas";
      $query_gal = mysqli_query($koneksi, $sql_gal);
      $no = $posisi+1;
      while ($data_gal = mysqli_fetch_row($query_gal)) {
          $id_galeri = $data_gal[0];
          $gambar = $data_gal[1];
          $judul = $data_gal[2];
          $sinopsis = $data_gal[3];
          $tanggal = $data_gal[4]; ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><img src="images/gambar-galeri/<?php echo $gambar; ?>" alt="" width="75%"></td>
                    <td><?php echo $judul; ?></td>
                    <td><?php echo $sinopsis; ?></td>
                    <td><?php echo $tanggal; ?></td>
                    <td align="center">
                        <a href="edit-galeri-data-<?php echo $id_galeri; ?>" class="btn btn-xs btn-info"><i
                                class="fas fa-edit"></i></a>
                        <a href="detail-galeri-data-<?php echo $id_galeri; ?>" class="btn btn-xs btn-info"
                            title="Detail"><i class="fas fa-eye"></i></a>
                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $judul; ?>?')) window.location.href ='galeri-data-<?php echo $id_galeri; ?>-mode-hapus_notif-hapusberhasil'"
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
    $sql_jum = "  SELECT `id_galeri`,
                         `gambar`, 
                         `judul_gambar`, 
                         `sinopsis_gambar`  
                  FROM    `galeri`";
    if (!empty($katakunci_galeri)) {
        $sql_jum .= " WHERE `judul_gambar` LIKE '%$katakunci_galeri%'";
    }
    $sql_jum .= " ORDER BY `judul_gambar`";
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