<?php
    //koneksi database
    $konek =  mysqli_connect("localhost", "root", "", "trashiot");

    //baca tbsensor
    $sql = mysqli_query($konek, "select * from monitor where id_tps order by id_monitor desc");
    //data terakhir di atas

    //data paling atas
    $data = mysqli_fetch_array($sql);
    $nilai = $data['nilai'];
    
    //uji apa nila nilai nilai blm ada makan suh di anggap ==0
    if ($nilai == "") {
        $nilai = 0;
    }
    //cetak nilai
    if ($nilai  >=91 && $nilai  <=100) {
        $sql_mon = "SELECT `status` FROM `tps` LIMIT 1";
        $query_mon = mysqli_query($konek, $sql_mon);
        while ($data_mon = mysqli_fetch_row($query_mon)) {
            $status = $data_mon[0];
            if ($status == 0) {
                $notif = "INSERT INTO `notifikasi`(`jenis_notif`,`judul_notif`,`deskripsi`)
                              VALUES (1,'Sampah penuh','TPS Merjosari')";
                mysqli_query($konek, $notif);
            }
        }
        $penuh = "UPDATE `tps` SET `status`=1";
        mysqli_query($konek, $penuh);
    }
    echo $nilai;
