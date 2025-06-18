<?php
    //$rilis = new DateTime('now',new DateTimeZone('Asia/Jakarta'));
    $nama = $_POST['nama_galeri'];
    $sinopsis = $_POST['sinopsis_galeri'];
    $tanggal = $_POST['tanggal'];
    
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
    $direktori = 'images/gambar-galeri/'.$nama_file;

    if (!move_uploaded_file($lokasi_file, $direktori)) {
        header("Location:tambah-galeri-data-".$id_galeri."_notif-tambahkosong-jenis-Foto");
    } elseif (empty($nama)) {
        header("Location:tambah-galeri-data-".$id_galeri."_notif-tambahkosong-jenis-Nama_Galeri");
    } elseif (empty($sinopsis)) {
        header("Location:tambah-galeri-data-".$id_galeri."_notif-tambahkosong-jenis-Sinopsis_Galeri");
    } else {
        $sql = "INSERT INTO `galeri`(`judul_gambar`,`sinopsis_gambar`,`gambar`,`tanggal`)
                VALUES ('$nama','$sinopsis','$nama_file','$tanggal')";
        mysqli_query($koneksi, $sql);
        $id_galeri = mysqli_insert_id($koneksi);
        header("Location:galeri_notif-tambahberhasil");
    }