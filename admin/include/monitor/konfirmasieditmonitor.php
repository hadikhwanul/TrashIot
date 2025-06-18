<?php
    if (isset($_SESSION['id_monitor'])) {
        $id_monitor = $_SESSION['id_monitor'];
        $nama = $_POST['nama_tps'];
        $alamat = $_POST['alamat'];

        $lokasi_file = $_FILES['foto_tps']['tmp_name'];
        $nama_file = $_FILES['foto_tps']['name'];
        $direktori = 'images/gambar-monitor/'.$nama_file;
        
        //get gambar
        $sql_mo = "SELECT `foto_tps` FROM `monitor` WHERE `id_monitor`='$id_monitor'";
        $query_mo = mysqli_query($koneksi, $sql_mo);
        while ($data_mo = mysqli_fetch_row($query_mo)) {
            $foto = $data_mo[0];
            //echo $foto;
        }
        if (empty($nama)) {
            header("Location:edit-monitor-data-".$id_monitor."_notif-editkosong-jenis-Nama_Tps");
        } elseif (empty($alamat)) {
            header("Location:edit-monitor-data-".$id_monitor."_notif-editkosong-jenis-Alamat");
        } else {
            $lokasi_file = $_FILES['foto_tps']['tmp_name'];
            $nama_file = $_FILES['foto_tps']['name'];
            $direktori = 'images/gambar-monitor/'.$nama_file;
            if (move_uploaded_file($lokasi_file, $direktori)) {
                if (!empty($foto)) {
                    unlink("images/gambar-monitor/$foto");
                }
                $sql = "UPDATE `monitor` 
                        SET `nama_tps`='$nama', 
                            `alamat`='$alamat',
                            `foto_tps`='$nama_file'
                        WHERE `id_monitor`='$id_monitor'";
                mysqli_query($koneksi, $sql);
            } else {
                $sql = "UPDATE `monitor` 
                        SET `nama_tps`='$nama', 
                            `alamat`='$alamat'
                        WHERE `id_monitor`='$id_monitor'";
                mysqli_query($koneksi, $sql);
            }
            header("Location:monitor_notif-editberhasil");
        }
    }
