<?php
  session_start();
  include('../koneksi/koneksi.php');
  if (isset($_GET["include"])) {
      $include = $_GET["include"];
      if ($include=="konfirmasi-login") {
          include("include/akses/konfirmasilogin.php");
      } elseif ($include=="keluar") {
          include("include/akses/keluar.php");
      } elseif ($include=="konfirmasi-tambah-galeri") {
          include("include/galeri/konfirmasitambahgaleri.php");
      } elseif ($include=="konfirmasi-edit-galeri") {
          include("include/galeri/konfirmasieditgaleri.php");
      } elseif ($include=="konfirmasi-tambah-konten") {
          include("include/konten/konfirmasitambahkonten.php");
      } elseif ($include=="konfirmasi-edit-konten") {
          include("include/konten/konfirmasieditkonten.php");
      } elseif ($include=="konfirmasi-tambah-monitor") {
          include("include/monitor/konfirmasitambahmonitor.php");
      } elseif ($include=="konfirmasi-edit-monitor") {
          include("include/monitor/konfirmasieditmonitor.php");
      } elseif ($include=="konfirmasi-tambah-user") {
          include("include/user/konfirmasitambahuser.php");
      } elseif ($include=="konfirmasi-edit-user") {
          include("include/user/konfirmasiedituser.php");
      } elseif ($include=="konfirmasi-edit-profil") {
          include("include/profil/konfirmasieditprofil.php");
      } elseif ($include=="konfirmasi-angkut") {
          include("include/monitor/konfirmasiangkut.php");
      }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php include("includes/head.php") ?>
    
</head>

<body>
<?php // include("includes/loader.php")?>
    <?php
        if (isset($_GET["include"])) {
            $include = $_GET["include"];
            // cek apakah ada session id amin
            if (isset($_SESSION['id_user'])) {
                ?>

    <body>
        <!-- Wrapper Start -->
        <div class="wrapper">
            <!-- sidebar -->
            <?php include("includes/sidebar.php") ?>
            <!-- navbar -->
            <?php include("includes/header.php") ?>

            <!-- Page Content  -->
            <div class="content-wrapper">
                <?php
                    if ($include=="dashboard") {
                        include("include/dashboard.php");
                    } elseif ($include=="profil") {
                        include("include/profil/profil.php");
                    } elseif ($include=="edit-profil") {
                        include("include/profil/editprofil.php");
                    } elseif ($include=="user") {
                        include("include/user/user.php");
                    } elseif ($include=="tambah-user") {
                        include("include/user/tambahuser.php");
                    } elseif ($include=="edit-user") {
                        include("include/user/edituser.php");
                    } elseif ($include==("detail-user")) {
                        include("include/user/detailuser.php");
                    } elseif ($include=="monitor") {
                        include("include/monitor/monitor.php");
                    } elseif ($include=="tambah-monitor") {
                        include("include/monitor/tambahmonitor.php");
                    } elseif ($include=="edit-monitor") {
                        include("include/monitor/editmonitor.php");
                    } elseif ($include=="detail-monitor") {
                        include("include/monitor/detailmonitor.php");
                    } elseif ($include=="galeri") {
                        include("include/galeri/galeri.php");
                    } elseif ($include=="tambah-galeri") {
                        include("include/galeri/tambahgaleri.php");
                    } elseif ($include=="edit-galeri") {
                        include("include/galeri/editgaleri.php");
                    } elseif ($include=="detail-galeri") {
                        include("include/galeri/detailgaleri.php");
                    } elseif ($include=="konten") {
                        include("include/konten/konten.php");
                    } elseif ($include=="tambah-konten") {
                        include("include/konten/tambahkonten.php");
                    } elseif ($include=="edit-konten") {
                        include("include/konten/editkonten.php");
                    } elseif ($include=="detail-konten") {
                        include("include/konten/detailkonten.php");
                    } elseif ($include=="pesan") {
                        include("include/pesan/pesan.php");
                    } elseif ($include=="detail-pesan") {
                        include("include/pesan/detailpesan.php");
                    } else {
                        include("include/dashboard.php");
                    } ?>
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- Wrapper END -->
        <!-- footer -->
        <?php include("includes/footer.php") ?>

        <!-- Optional JavaScript -->
        <?php include("includes/script.php") ?>
    </body>
    <?php
            } else {
                include("include/akses/login.php");
            }
        } else {
            if (isset($_SESSION['id_user'])) {
                //pemanggilan ke halaman-halaman jika ada session
            ?>

    <body>
        <!-- Wrapper Start -->
        <div class="wrapper">
            <!-- sidebar -->
            <?php include("includes/sidebar.php") ?>
            <!-- navbar -->
            <?php include("includes/header.php") ?>

            <!-- Page Content  -->
            <div class="content-wrapper">
                <?php include("include/dashboard.php") ?>
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- Wrapper END -->
        <!-- footer -->
        <?php include("includes/footer.php") ?>

        <!-- Optional JavaScript -->
        <?php include("includes/script.php") ?>
    </body>
    <?php
            } else {
                //pemanggilan halaman form login
                include("include/akses/login.php");
            }
        }
                ?>
</body>

</html>