<!-- ======= Hero Section ======= -->
<section id="hero">

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                <div data-aos="zoom-out">
                    <h1> di Website <span>TrashIoT</span></h1>
                    <h2>Dapat Memonitoring TPS yang Sudah Kerja Sama Dengan TrashIoT</h2>
                    <div class=" text-lg-start">
                        <a href="#monitor" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                <img src="assets/img/3.png" class="img-fluid animated" alt="" style="max-height: 510px;">
            </div>
        </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
            <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave1">
            <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
        </g>
        <g class="wave2">
            <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
            <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
        </g>
    </svg>

</section><!-- End Hero -->
<!-- ======= Gallery Section ======= -->
<main id="main">
    <section id="monitor gallery" class="monitor gallery">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Monitoring</h2>
                <p>Check our TPS</p>
            </div>
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
            <div class="row g-0" data-aos="fade-left">

                <div class="col-md-4">
                    <div class="thumbnail gallery-item" data-aos="zoom-in" data-aos-delay="200">
                        <a href="detail-monitor">
                            <img src="admin/images/gambar-monitor/<?php echo $foto; ?>" alt="" class="img-fluid">
                        </a>
                        <div class="caption">
                            <h3><b><?php echo $nama ; ?></b></h3>
                            <p><?php echo $alamat ; ?></p>
                        </div>
                    </div>
                </div>
                <?php
                            } ?>
            </div>
        </div>
    </section>
    <!-- End Gallery Section -->
</main>
<!-- End #main -->