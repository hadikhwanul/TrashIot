<?php
    if (isset($_SESSION['id_galeri'])) {
        $id_galeri = $_SESSION['id_galeri'];
        $nama = $_POST['judul_gambar'];
        $sinopsis = $_POST['sinopsis_gambar'];
        $tanggal = $_POST['tanggal'];

        $lokasi_file = $_FILES['foto']['tmp_name'];
        $nama_file = $_FILES['foto']['name'];
        $direktori = 'images/gambar-galeri/'.$nama_file;
        
        //get gambar
        $sql_gl = "SELECT `gambar` FROM `galeri` WHERE `id_galeri`='$id_galeri'";
        $query_gl = mysqli_query($koneksi, $sql_gl);
        while ($data_gl = mysqli_fetch_row($query_gl)) {
            $gambar = $data_gl[0];
            //echo $gambar;
        }
        if (empty($nama)) {
            header("Location:edit-galeri-data-".$id_galeri."_notif-editkosong-jenis-Judul");
        } elseif (empty($sinopsis)) {
            header("Location:edit-galeri-data-".$id_galeri."_notif-editkosong-jenis-Sinopsis");
        } else {
            $lokasi_file = $_FILES['foto']['tmp_name'];
            $nama_file = $_FILES['foto']['name'];
            $direktori = 'images/gambar-galeri/'.$nama_file;
            if (move_uploaded_file($lokasi_file, $direktori)) {
                if (!empty($gambar)) {
                    unlink("images/gambar-galeri/$gambar");
                }
                $sql = "UPDATE `galeri` 
                        SET `judul_gambar`='$nama', 
                            `sinopsis_gambar`='$sinopsis',
                            `gambar`='$nama_file',
                            `tanggal`='$tanggal'
                        WHERE `id_galeri`='$id_galeri'";
                mysqli_query($koneksi, $sql);
            } else {
                $sql = "UPDATE `galeri` 
                        SET `judul_gambar`='$nama', 
                            `sinopsis_gambar`='$sinopsis',
                            `tanggal`='$tanggal'
                        WHERE `id_galeri`='$id_galeri'";
                mysqli_query($koneksi, $sql);
            }
            header("Location:galeri_notif-editberhasil");
        }
    }