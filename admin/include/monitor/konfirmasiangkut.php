<?php
    if (isset($_POST['bersihkan'])) {
        $waktu = $_POST['waktu'];
        $petugas = $_POST['petugas'];


        if (empty($petugas)) {
            header("Location:monitoring-data-".$id_monitor."_notif-tambahkosong-jenis-Petugas");
        } else {
            $notif = "INSERT INTO `notifikasi`(`jenis_notif`,`judul_notif`,`deskripsi`)
                    VALUES (0,'Sampah kosong','TPS Merjosari')";
            mysqli_query($koneksi, $notif);
            $kosong = "UPDATE `tps` SET `status`=0";
            mysqli_query($koneksi, $kosong);
            $id_notif = mysqli_insert_id($koneksi);
            $sql = "INSERT INTO `riwayat_angkut`(`id_tps`,`waktu`,`petugas`)
                    VALUES ('1','$waktu','$petugas')";
            mysqli_query($koneksi, $sql);
            $id_angkut = mysqli_insert_id($koneksi);
            header("Location:monitor_notif-tambahberhasil");
        }
    }
