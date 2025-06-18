<?php
    //$rilis = new DateTime('now',new DateTimeZone('Asia/Jakarta'));
    $nama = $_POST['nama_tps'];
    $alamat = $_POST['alamat'];
    
    $lokasi_file = $_FILES['foto_tps']['tmp_name'];
    $nama_file = $_FILES['foto_tps']['name'];
    $direktori = 'images/gambar-monitor/'.$nama_file;

    if (!move_uploaded_file($lokasi_file, $direktori)) {
        header("Location:tambah-monitor-data-".$id_monitor."_notif-tambahkosong-jenis-Foto_Tps");
    } elseif (empty($nama)) {
        header("Location:tambah-monitor-data-".$id_monitor."_notif-tambahkosong-jenis-Nama_Tps");
    } elseif (empty($alamat)) {
        header("Location:tambah-monitor-data-".$id_monitor."_notif-tambahkosong-jenis-alamat");
    } else {
        $sql = "INSERT INTO `monitor`(`nama_tps`,`alamat`,`foto_tps`)
                VALUES ('$nama','$alamat','$nama_file')";
        mysqli_query($koneksi, $sql);
        $id_monitor = mysqli_insert_id($koneksi);
        header("Location:monitor_notif-tambahberhasil");
    }
