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

    echo $nilai;
