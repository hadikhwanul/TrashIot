<?php
    if (isset($_SESSION['id_konten'])) {
        $id_konten = $_SESSION['id_konten'];
        $judul = $_POST['judul_konten'];
        $sinopsis = $_POST['sinopsis_konten'];
       
        if (empty($judul)) {
            header("Location:edit-konten-data-".$id_konten."_notif-editkosong-jenis-Judul");
        } elseif (empty($sinopsis)) {
            header("Location:edit-konten-data-".$id_konten."_notif-editkosong-jenis-Sinopsis");
        } else {
            $sql = "UPDATE `konten` 
                        SET `judul_konten`='$judul', 
                            `sinopsis`='$sinopsis'
                        WHERE `id_konten`='$id_konten'";
            mysqli_query($koneksi, $sql);
            header("Location:konten_notif-editberhasil");
        }
    }
