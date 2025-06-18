<!-- PHP untuk mendapatkan data monitor-->
<?php
    $timezone = new DateTimeZone('Asia/Jakarta');
    $date = new DateTime();
    $date->setTimeZone($timezone);
?>
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <ol>
                <li><a href="monitor"> Monitor</a></li>
                <li>Detail Monitor </li>
            </ol>
        </div>
        <div class="section-informasi">
            <h2>Detail Monitor TPS Merjosari</h2>
        </div>
    </div>
</section>
<!-- Main content -->
<section id="content" class="content">
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
                            <a href="contact"> <button type="button" class="btn btn-primary float-right"
                                    data-target="#exampleModalCenter">
                                    Laporkan
                                </button></a>
                        </div>
                        <div class="iq-card-body">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h1><span class="text-info" style="font-size: 5vw;" id="ceknilai" name="nilai">
                                            1</span>%</h1>
                                </div>
                                <div id="status"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
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
                                        <td><img src="admin/images/gambar-monitor/<?php echo $foto ?>" alt="" max
                                                width="250px"></td>
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
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="10%">No</th>
                                        <th width="30%">Nama TPS</th>
                                        <th width="30%">Tanggal</th>
                                        <th width="30%">Petugas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            //get data monitor
                            include('admin/includes/fungsi.php');
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
</section>
<script>
var html = document.getElementById('status')
var nilai = document.getElementById('ceknilai')
nilai.addEventListener("DOMSubtreeModified", function() {
    var n = parseInt(nilai.innerHTML)
    if (n >= 0 && n <= 50) {
        html.innerHTML = `<div class="badge badge-success" id="badge">
                        <h3 class="text-white"> Kapasitas TPS Normal </h3>
                    </div>`
    } else if (n >= 51 && n <= 90) {
        html.innerHTML = `<div class="badge badge-info" id="badge">
                        <h3 class="text-white"> Kapasitas TPS Cukup</h3>
                    </div>`
    } else if (n >= 91 && n <= 100) {
        html.innerHTML = `<div class="badge badge-danger" id="badge">
                        <h3 class="text-white">Kapasitas TPS Penuh</h3>
                  </div>`
    }
});
</script>
<!-- /.content -->