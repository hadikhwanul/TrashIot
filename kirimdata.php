<?php
    $timezone = new DateTimeZone('Asia/Jakarta');
    $date = new DateTime();
    $date->setTimeZone($timezone);

    //koneksi database
    $konek =  mysqli_connect("localhost", "root", "", "trashiot");

    //baca data yang dikirim data dari ESP32
    $nilai = $_GET['nilai'];
    $tanggal = $date->format("Y-m-d H:i:s");

    //simpan ke monitor

    //auto incrementnya jadi 1 / mengembalikan ID menjadi 1 apabila dikosongkan
    mysqli_query($konek, "ALTER TABLE monitor AUTO_INCREMENT=1");

    //simpan data sensor ke tabel tb_sensor
    $simpan = mysqli_query($konek, "INSERT INTO monitor(id_tps, nilai, tanggal ) VALUES('1','$nilai','$tanggal')");
    //uji simpan untuk memberikan respon
    if ($simpan) {
        echo "Berhasil dikirim";
    } else {
        echo "Gagal Terkirim";
    }
