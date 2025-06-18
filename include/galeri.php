<!-- ======= Hero Section ======= -->
<section id="hero">

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                <div data-aos="zoom-out">
                    <h1> Website <span>TrashIoT</span></h1>
                    <h2>Juga Memiliki Beberapa Dokumentasi</h2>
                    <div class=" text-lg-start">
                        <a href="#gallery" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                <img src="assets/img/1.png" class="img-fluid animated" alt="" width="100%">
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
<main id="main">

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Gallery</h2>
                <p>Check our Gallery</p>
            </div>

            <div class="row g-0" data-aos="fade-left">
                <?php
                    $sql_gal =" SELECT `id_galeri`,
                                        `gambar`, 
                                        `judul_gambar`, 
                                        `sinopsis_gambar`,
                                        DATE_FORMAT(`tanggal`, '%d-%m-%Y') 
                                  FROM `galeri`";
                    $query_gal = mysqli_query($koneksi, $sql_gal);
                    while ($data_gal = mysqli_fetch_row($query_gal)) {
                        $id_galeri = $data_gal[0];
                        $gambar = $data_gal[1];
                        $judul = $data_gal[2];
                        $sinopsis = $data_gal[3];
                        $tanggal = $data_gal[4]; ?>
                <div class="col-md-4" style="background-color: white;">
                    <div class="thumbnail gallery-item" data-aos="zoom-in" data-aos-delay="200">
                        <a href="detail-galeri-data-<?php echo $id_galeri; ?>">
                            <center><img src="admin/images/gambar-galeri/<?php echo $gambar; ?>" alt=""
                                    class="img-fluid" style="max-height: 250px;"></center>
                        </a>
                        <div class="caption">
                            <br>
                            <i class="bi bi-calendar-week"> <?php echo $tanggal; ?></i>
                            <p><?php echo $judul; ?></p>
                        </div>
                    </div>
                </div>
                <?php
                    }?>
            </div>
        </div>
    </section><!-- End Gallery Section -->
</main><!-- End #main -->