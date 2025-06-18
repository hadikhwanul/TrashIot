<?php
    
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $pesan = $_POST['pesan'];
    $tanggal = $_POST['tanggal'];


    if (empty($nama)) {
        header("Location:contact-data-".$id_pesan."_notif-tambahkosong-jenis-nama");
    } elseif (empty($email)) {
        header("Location:contact-data-".$id_pesan."_notif-tambahkosong-jenis-email");
    } elseif (empty($subject)) {
        header("Location:contact-data-".$id_pesan."_notif-tambahkosong-jenis-subject");
    } elseif (empty($pesan)) {
        header("Location:contact-data-".$id_pesan."_notif-tambahkosong-jenis-pesan");
    } else {
        $sql = "INSERT INTO `pesan`(`nama`,`email`,`subject`,`pesan`,`tanggal`)
                VALUES ('$nama','$email','$subject','$pesan','$tanggal')";
        mysqli_query($koneksi, $sql);
        $id_pesan = mysqli_insert_id($koneksi);
        $notif = "INSERT INTO `notifikasi`(`jenis_notif`,`judul_notif`,`deskripsi`)
                    VALUES (2,'$subject','$pesan')";
        mysqli_query($koneksi, $notif);
        header("Location:contact_notif-tambahberhasil");
    }