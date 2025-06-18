<!-- PHP untuk mendapatkan data monitor-->
<?php
  if (isset($_GET['data'])) {
      $id_monitor = $_GET['data'];
      $_SESSION['id_monitor'] = $id_monitor;
      //get data monitor
      $sql_mon = " SELECT `foto_tps`, 
                         `nama_tps`, 
                         `alamat`        
                  FROM   `monitor`
                WHERE `id_monitor` = '$id_monitor' ";
      $query_mon = mysqli_query($koneksi, $sql_mon);
      while ($data_mon = mysqli_fetch_row($query_mon)) {
          $foto = $data_mon[0];
          $nama = $data_mon[1];
          $alamat = $data_mon[2];
      }
  }
?>
<!-- PHP untuk mendapatkan data monitor-->
<!-- Main content -->
<section id="content-page" class="content-page">
   <div class="card">
      <div class="card-header">
         <div class="card-tools">
            <a href="monitor" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i>
               Kembali</a>
         </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
         <div class="card-deck">
            <div class="col-lg-4">
               <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                  <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                        <h4 class="card-title">Presentase TPS</h4>
                     </div>
                  </div>
                  <div class="iq-card-body">
                     <div class="card text-center">
                        <div class="card-body">
                           <h1><span id=""> 70 %</span></h1>
                        </div>
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
                           <tr>
                              <td><img src="images/gambar-monitor/<?php echo $foto ?>" alt="" max width="250px"></td>
                              <td><?php echo $nama ; ?></td>
                              <td><?php echo $alamat ;?></td>
                              </td>
                           </tr>
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
                     <table class="table mb-0">
                        <thead class="thead-light">
                           <tr>
                              <th scope="col">No</th>
                              <th scope="col">Nama TPS</th>
                              <th scope="col">Tanggal</th>
                              <th scope="col">Waktu</th>
                              <th scope="col">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>TPS Merjosari</td>
                              <td>29-04-2022</td>
                              <td>07.00</td>

                              <td>
                                 <a href="#" class="btn btn-xs btn-warning">
                                    <i class="fas fa-trash" title="Hapus"></i>
                                 </a>
                              </td>
                           </tr>
                           <tr>
                              <td>2</td>
                              <td>TPS Merjosari</td>
                              <td>29-04-2022</td>
                              <td>14.00</td>

                              <td>
                                 <a href="#" class="btn btn-xs btn-warning">
                                    <i class="fas fa-trash" title="Hapus"></i>
                                 </a>
                              </td>
                           </tr>
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

</section>
<!-- /.content -->