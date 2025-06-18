<?php
  if ((isset($_GET['aksi']))&&(isset($_GET['data']))) {
      if ($_GET['aksi']=='hapus') {
          $id_konten = $_GET['data'];
          //hapus konten
          $sql_dh = "DELETE FROM `konten` WHERE `id_konten` = '$id_konten'";
          mysqli_query($koneksi, $sql_dh);
      }
  }
  if (isset($_POST["katakunci"])) {
      $katakunci_konten = $_POST["katakunci"];
      $_SESSION['katakunci_konten'] = $katakunci_konten;
  }
  if (isset($_SESSION['katakunci_konten'])) {
      $katakunci_konten = $_SESSION['katakunci_konten'];
  } else {
      unset($_SESSION['katakunci_konten']);
  }
?>
<!-- Penutup hapus data dan Cari Data konten-->
<!-- Main content -->
<section id="content-page" class="content-page">
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="tambah-konten" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah
                    Konten</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-md-12">
                <form method="post" action="konten">
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
        </div>
        <table class="table mb-0">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="50%">Judul</th>
                    <th width="30%">Sinopsis</th>
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
            $halaman=$_GET['halaman'];
            $posisi=($halaman-1)* $batas;
        }
        $sql_kon =" SELECT `id_konten`, 
                            `judul_konten`, 
                            `sinopsis` 
                    FROM `konten`";
        
        if (!empty($katakunci_konten)) {
            $sql_kon .= " WHERE `judul_konten` LIKE '%$katakunci_konten%' ";
        }
      $sql_kon .=" ORDER BY `judul_konten` limit $posisi, $batas";
      $query_kon = mysqli_query($koneksi, $sql_kon);
      $no = $posisi+1;
      while ($data_kon = mysqli_fetch_row($query_kon)) {
          $id_konten = $data_kon[0];
          $judul = $data_kon[1];
          $sinopsis = $data_kon[2]; ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $judul; ?></td>
                    <td><?php echo $sinopsis; ?></td>
                    <td align="center">
                        <a href="edit-konten-data-<?php echo $id_konten; ?>" class="btn btn-xs btn-info"><i
                                class="fas fa-edit"></i></a>
                        <a href="detail-konten-data-<?php echo $id_konten; ?>" class="btn btn-xs btn-info"
                            title="Detail"><i class="fas fa-eye"></i></a>
                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $judul; ?>?')) window.location.href ='konten-data-<?php echo $id_konten; ?>-mode-hapus_notif-hapusberhasil'"
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
    $sql_jum = "  SELECT `id_konten`, 
                        `judul_konten`, 
                        `sinopsis` 
                    FROM `konten`";
    if (!empty($katakunci_konten)) {
        $sql_jum .= " WHERE `judul_konten` LIKE '%$katakunci_konten%'";
    }
    $sql_jum .= " ORDER BY `judul_konten`";
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