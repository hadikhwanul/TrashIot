<?php
    
    $judul = $_POST['judul_konten'];
    $sinopsis = $_POST['sinopsis_konten'];


    if (empty($judul)) {
        header("Location:tambah-konten-data-".$id_konten."_notif-tambahkosong-jenis-Judul");
    } elseif (empty($sinopsis)) {
        header("Location:tambah-konten-data-".$id_konten."_notif-tambahkosong-jenis-Sinopsis");
    } else {
        $sql = "INSERT INTO `konten`(`judul_konten`,`sinopsis`)
                VALUES ('$judul','$sinopsis')";
        mysqli_query($koneksi, $sql);
        $id_konten = mysqli_insert_id($koneksi);
        header("Location:konten_notif-tambahberhasil");
    }
