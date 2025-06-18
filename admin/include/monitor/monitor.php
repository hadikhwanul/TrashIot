<!-- PHP untuk mendapatkan data monitor-->
<?php
    $timezone = new DateTimeZone('Asia/Jakarta');
    $date = new DateTime();
    $date->setTimeZone($timezone);
?>

<!-- Main content -->
<section id="content-page" class="content-page">
  <div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <div class="card-deck">
        <div class="col-lg-4">
          <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between">
              <div class="iq-header-title">
                <h4 class="card-title">Kapasitas TPS</h4>
              </div>
              <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
                Tindakan
              </button>
            </div>
            <div class="iq-card-body">
              <div class="card text-center">
                <div class="card-body">
                  <h1 ><span class="text-info" style="font-size: 5vw;" id="ceknilai" name="nilai"> </span>%</h1>
                </div>
                <div id="status"></div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between">
              <div class="iq-header-title">
                <h4 class="card-title">Detail TPS</h4>

              </div>
              <a href="edit-monitor" class="btn btn-sm btn-warning float-right"><i class="fas fa-edit"></i>
                Edit TPS</a>
            </div>
            <div class="iq-card-body">
              <table class="table mb-0">
                <thead>
                  <tr>
                    <th width="15%">Foto</th>
                    <th width="35%">Nama TPS</th>
                    <th width="35%">Alamat</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                            //get data monitor
                            $sql_mon = "  SELECT `t`.`foto`, 
                                                `t`.`nama_tps`, 
                                                `t`.`alamat`,
                                                `m`.`tanggal`      
                                          FROM   `monitor` `m`
                                          INNER JOIN `tps` `t` ON `m`.`id_tps`=`t`.`id_tps`
                                          LIMIT 1";
                            $query_mon = mysqli_query($koneksi, $sql_mon);
                            while ($data_mon = mysqli_fetch_row($query_mon)) {
                                $foto = $data_mon[0];
                                $nama = $data_mon[1];
                                $alamat = $data_mon[2];
                                $tgl = $data_mon[3]; ?>
                  <tr>
                    <td><img src="images/gambar-monitor/<?php echo $foto ?>" alt="" max width="250px"></td>
                    <td><?php echo $nama ; ?></td>
                    <td><?php echo $alamat ; ?></td>
                    </td>
                  </tr>
                  <?php
                            } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-13">
        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
          <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-ti tle">
              <h4 class="card-title">Riwayat Pengangkutan</h4>
            </div>
          </div>
          <div class="iq-card-body">
            <div class="table-responsive">
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
              <table class="table mb-0">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama TPS</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Petugas</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                            //get data monitor
                            include('includes/fungsi.php');
                            $sql_riw = " SELECT `t`.`nama_tps`,
                                                DATE_FORMAT(`r`.`waktu`, '%d-%m-%Y %H:%i'),
                                                `r`.`petugas`        
                                        FROM   `riwayat_angkut` `r`
                                        INNER JOIN `tps` `t` ON `r`.`id_tps`=`t`.`id_tps`
                                        ORDER BY `r`.`waktu` DESC";
                            $query_riw = mysqli_query($koneksi, $sql_riw);
                            $no = +1;
                            while ($data_riw = mysqli_fetch_row($query_riw)) {
                                $nama = $data_riw[0];
                                $waktu = $data_riw[1];
                                $petugas = $data_riw[2]; ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo TanggalIndo($waktu); ?></td>
                    <td><?php echo $petugas; ?></td>
                  </tr>
                  <?php
                            $no++;
                            } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">&nbsp;</div>
    
  </div>
  <!-- /.card -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tindakan yang dilakukan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="konfirmasi-angkut" method="POST">
            Apakah Anda Yakin Ingin Membersihkan TPS
            <input hidden type="text" class="form-control" id="tanggal" name="waktu" value="<?php echo $date->format('Y-m-d H:i:s'); ?>">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Pilih Petugas</label>
              <select class="form-control" id="exampleFormControlSelect1" name="petugas">
                <option value="Hadi Ikhwanul Fuadi">Hadi Ikhwanul Fuadi</option>
                <option value="Fuadi Ikhwanul Hadi">Fuadi Ikhwanul Hadi</option>
              </select>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="bersihkan" value="bersihkan">Bersihkan</button>
      </div>
                          </form>
    </div>
  </div>
</div>
</section>
<script>
  var html = document.getElementById('status')
  var nilai = document.getElementById('ceknilai')
  
  nilai.addEventListener("DOMSubtreeModified", function (){
    var n = parseInt(nilai.innerHTML)
                  if (n >=0 && n <=50) {
                    html.innerHTML = `<div class="badge badge-success" id="badge">
                        <h3 class="text-white"> Kapasitas TPS Normal </h3>
                    </div>`
                  }
                  else if (n >=51 && n <=90){
                    html.innerHTML = `<div class="badge badge-info" id="badge">
                        <h3 class="text-white"> Kapasitas TPS Cukup</h3>
                    </div>`
                }
                  else if (n >=91 && n <=100){
                    html.innerHTML = `<div class="badge badge-danger" id="badge">
                        <h3 class="text-white">Kapasitas TPS Penuh</h3>
                  </div>`
                  } 
                });
  
                

</script>
<!-- /.content -->