  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

      <div id="logo">
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.php"><img src="assets/img/logo.png" alt="" style="width:200px; padding-top 5px;"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <?php
              if (isset($_GET['include'])) {
                  $include = $_GET['include'];
              }
            ?>
          <li><a
              class="nav-link scrollto <?php if (!isset($_GET['include'])||$_GET['include']=="home") { ?> active <?php } ?>"
              href="home">Home</a></li>
          <li><a class="nav-link scrollto <?php if (isset($_GET['include'])) {
                if ($include=="monitor" or $include=="detail-monitor") { ?> active <?php }
            } ?>" href="monitor">Monitoring</a></li>
          <li><a class="nav-link scrollto <?php if (isset($_GET['include'])) {
                if ($include=="galeri" or $include=="detail-galeri") { ?> active <?php }
            } ?>" href="galeri">Galeri</a></li>
          <li><a class="nav-link scrollto <?php if (isset($_GET['include'])) {
                if ($include=="aboutus") { ?> active <?php }
            } ?>" href="aboutus">About Us</a></li>
          <li><a class="nav-link scrollto <?php if (isset($_GET['include'])) {
                if ($include=="contact") { ?> active <?php }
            } ?>" href="contact">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->