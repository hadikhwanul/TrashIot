<?php
    //akses file koneksi database
    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $username = mysqli_real_escape_string($koneksi, $user);
        $password = mysqli_real_escape_string($koneksi, MD5($pass));
        
        //cek username dan password
        $sql="SELECT `id_user`, `level` FROM `user` WHERE `username`='$username' AND `password`='$password'";
        $query = mysqli_query($koneksi, $sql);
        $jumlah = mysqli_num_rows($query);
        if (empty($user)) {
            header("Location:index.php?include=login&gagal=userKosong");
        } elseif (empty($pass)) {
            header("Location:index.php?include=login&gagal=passKosong");
        } elseif ($jumlah==0) {
            header("Location:index.php?include=login&gagal=userpassSalah");
        } else {
            //get data
            while ($data = mysqli_fetch_row($query)) {
                $id_user = $data[0]; //1
                    //echo $id_user;
                $level = $data[1]; //speradmin
                $_SESSION['id_user']=$id_user;
                $_SESSION['level']=$level;
                header("Location:profil");
            }
        }
    }
