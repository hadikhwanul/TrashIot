<?php
    session_start();
    include('koneksi/koneksi.php');
    if (isset($_GET["include"])) {
        $include = $_GET["include"];
        if ($include=="konfirmasi-tambah-pesan") {
            include("include/konfirmasitambahpesan.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/head.php'); ?>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <?php
            //pemanggilan konten halaman index
            if (isset($_GET["include"])) {
                $include = $_GET["include"];
                if ($include=="home") {
                    include("include/home.php");
                } elseif ($include=="monitor") {
                    include("include/monitor.php");
                } elseif ($include=="detail-monitor") {
                    include("include/detailmonitor.php");
                } elseif ($include=="galeri") {
                    include("include/galeri.php");
                } elseif ($include=="detail-galeri") {
                    include("include/detailgaleri.php");
                } elseif ($include=="aboutus") {
                    include("include/aboutus.php");
                } elseif ($include=="contact") {
                    include("include/contact.php");
                } else {
                    include("include/home.php");
                }
            } else {
                include("include/home.php");
            }
        ?>
    <?php include("includes/footer.php"); ?>
    <?php include("includes/backtop.php");?>

    <!-- Optional JavaScript; choose one of the two! -->
    <?php include("includes/script.php");?>
</body>

</html>