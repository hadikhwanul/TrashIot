<?php
    $koneksi = mysqli_connect("localhost", "root", "", "trashiot");
    // cek koneksi
    if (!$koneksi) {
        die("Error koneksi: " . mysqli_connect_errno());
    }
