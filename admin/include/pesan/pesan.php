<?php
  if ((isset($_GET['aksi']))&&(isset($_GET['data']))) {
      if ($_GET['aksi']=='hapus') {
          $id_pesan = $_GET['data'];
          //hapus pesan
          $sql_dh = "DELETE FROM `pesan` WHERE `id_pesan` = '$id_pesan'";
          mysqli_query($koneksi, $sql_dh);
      }
  }
  if (isset($_POST["katakunci"])) {
      $katakunci_pesan = $_POST["katakunci"];
      $_SESSION['katakunci_pesan'] = $katakunci_pesan;
  }
  if (isset($_SESSION['katakunci_pesan'])) {
      $katakunci_pesan = $_SESSION['katakunci_pesan'];
  } else {
      unset($_SESSION['katakunci_pesan']);
  }
?>
<!-- Penutup hapus data dan Cari Data pesan-->
<!-- Main content -->
<section id="content-page" class="content-page">
    <div class="card">
        <!-- /.card-header -->
        <br><br>
        <div class="card-body">
            <div class="col-md-12">
                <form method="post" action="pesan">
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
        </div>
        <div class="col-sm-12">
            <?php if (!empty($_GET['notif'])) {?>
            <?php  if ($_GET['notif']=="hapusberhasil") {?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data berhasil dihapus.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } }?>
        </div>
        <table class="table mb-0">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="10%">Subject</th>
                    <th width="15%">Nama Pengirim</th>
                    <th width="15%">Email</th>
                    <th width="25%">Pesan</th>
                    <th width="15%">Tanggal</th>
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
        $sql_pes =" SELECT `id_pesan`, 
                            `subject`,
                            `nama`,
                            `email`,
                            `pesan`,
                            DATE_FORMAT(`tanggal`, '%d-%m-%Y %H:%i')
                    FROM `pesan`";
        
        if (!empty($katakunci_pesan)) {
            $sql_pes .= " WHERE `subject` LIKE '%$katakunci_pesan%' ";
        }
      $sql_pes .=" ORDER BY `subject` limit $posisi, $batas";
      $query_pes = mysqli_query($koneksi, $sql_pes);
      $no = $posisi+1;
      while ($data_pes = mysqli_fetch_row($query_pes)) {
          $id_pesan = $data_pes[0];
          $subject = $data_pes[1];
          $nama = $data_pes[2];
          $email = $data_pes[3];
          $pesan = $data_pes[4];
          $tanggal = $data_pes[5]; ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $subject; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $pesan; ?></td>
                    <td><?php echo $tanggal; ?></td>
                    <td align="center">
                        <a href="detail-pesan-data-<?php echo $id_pesan; ?>" class="btn btn-xs btn-info"
                            title="Detail"><i class="fas fa-eye"></i></a>
                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $subject; ?>?')) window.location.href ='pesan-data-<?php echo $id_pesan; ?>-mode-hapus_notif-hapusberhasil'"
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
    $sql_jum = " SELECT `id_pesan`, 
                        `subject`,
                        `nama`,
                        `email`,
                        `pesan`,
                        DATE_FORMAT(`tanggal`, '%d-%m-%Y %H:%i')
                  FROM `pesan`";
    if (!empty($katakunci_pesan)) {
        $sql_jum .= " WHERE `subject` LIKE '%$katakunci_pesan%'";
    }
    $sql_jum .= " ORDER BY `subject`";
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