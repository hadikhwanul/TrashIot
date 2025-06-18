<?php
  if (isset($_GET['data'])) {
      $id_galeri = $_GET['data'];
      $_SESSION['id_galeri'] = $id_galeri;
      //get data galeri
      $sql_gal = " SELECT `gambar`, 
                          `judul_gambar`, 
                          `sinopsis_gambar`,
                          DATE_FORMAT(`tanggal`, '%d-%m-%Y') 
                      FROM `galeri`
                WHERE `id_galeri` = '$id_galeri' ";
      $query_gal = mysqli_query($koneksi, $sql_gal);
      while ($data_gal = mysqli_fetch_row($query_gal)) {
          $gambar = $data_gal[0];
          $judul = $data_gal[1];
          $sinopsis = $data_gal[2];
          $tanggal = $data_gal[3];
      }
  }
?>
<main id="main">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="galeri">Galeri</a></li>
                    <li>Detail Galeri </li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <!-- ======= About Section ======= -->
    <section id="detail-galeri" class="detail-galeri">
        <div class="container" data-aos="fade-up">

            <div class="section-informasi">
                <h2>Detail Galeri <?php echo $judul ?></h2>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <img src="admin/images/gambar-galeri/<?php echo $gambar; ?>" class="img-fluid" alt="" title="">
                </div>
                <div class="col-lg-7 pt-4 pt-lg-0 content">
                    <h3><?php echo $judul ?></h3>
                    <div class="row">
                        <div class="col-lg-7">
                            <i class="bi bi-calendar-week"><?php echo $tanggal ?></i>
                        </div>
                    </div>
                    <p><?php echo $sinopsis ?></p>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->
</main>