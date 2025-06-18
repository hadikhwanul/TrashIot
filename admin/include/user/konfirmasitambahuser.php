<?php
    $foto = $_POST['foto'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $user = mysqli_real_escape_string($koneksi, $username);
    $pass = mysqli_real_escape_string($koneksi, md5($password));

    $lokasi_file = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
    $direktori = 'images/gambar-user/'.$nama_file;

    if (!move_uploaded_file($lokasi_file, $direktori)) {
        header("Location:tambah-user-data-".$id_user."_notif-tambahkosong-jenis-foto");
    } elseif (empty($nama)) {
        header("Location:tambah-user-data-".$id_user."_notif-tambahkosong-jenis-Nama");
    } elseif (empty($email)) {
        header("Location:tambah-user-data-".$id_user."_notif-tambahkosong-jenis-Email");
    } elseif (empty($username)) {
        header("Location:tambah-user-data-".$id_user."_notif-tambahkosong-jenis-Username");
    } elseif (empty($password)) {
        header("Location:tambah-user-data-".$id_user."_notif-tambahkosong-jenis-Password");
    } elseif (empty($level)) {
        header("Location:tambah-user-data-".$id_user."_notif-tambahkosong-jenis-Lever");
    } else {
        $sql = "INSERT INTO `user` (`foto`, `nama`, `email`, `username`, `password`, `level`) 
        VALUES ('$nama_file', '$nama', '$email', '$user', '$pass', '$level')";
            
        mysqli_query($koneksi, $sql);
        header("Location:user_notif-tambahberhasil");
    }
