 <?php
   $id_user = $_SESSION['id_user'];
   $sql_us = " SELECT   `nama`,
                        `username`,
                        `password`,
                        `level`,
                        `foto`,
                        `email` 
               FROM `user` 
               WHERE `id_user` = '$id_user'";
   $query_us = mysqli_query($koneksi, $sql_us);
   while ($data_us = mysqli_fetch_row($query_us)) {
       $nama = $data_us[0];
       $user = $data_us[1];
       $pass = $data_us[2];
       $level = $data_us[3];
       $foto = $data_us[4];
       $email = $data_us[5];
   }
 ?>
 <!-- TOP Nav Bar -->
 <div class="iq-top-navbar">
     <div class="iq-navbar-custom">
         <nav class="navbar navbar-expand-lg navbar-light p-0">
             <div class="iq-menu-bt d-flex align-items-center">
                 <div class="wrapper-menu">
                     <div class="main-circle"><i class="ri-menu-line"></i></div>
                     <div class="hover-circle"><i class="ri-close-fill"></i></div>
                 </div>
                 <div class="iq-navbar-logo d-flex justify-content-between ml-3">
                     <a href="index.html" class="header-logo">
                         <img src="images/logo.png" class="w-25 img-fluid rounded" alt="">
                     </a>
                 </div>
             </div>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                 <i class="ri-menu-3-line"></i>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav ml-auto navbar-list">
                     <li class="nav-item nav-icon">
                         <a href="#" class="search-toggle iq-waves-effect bg-primary rounded">
                             <i class="ri-notification-line"></i>
                             <span class="bg-danger dots"></span>
                         </a>
                         <div class="iq-sub-dropdown">
                             <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                     <div class="bg-primary p-3">
                                         <h5 class="mb-0 text-white">All Notifications</h5>
                                     </div>
                                     <?php
                            //get data monitor
                            $sql_notif = " SELECT `jenis_notif`,`judul_notif`,
                                                `deskripsi`,       
                                                DATE_FORMAT(`waktu`, '%d-%m-%Y %H:%i')
                                        FROM   `notifikasi`
                                        ORDER BY `waktu` DESC";
                            $query_notif = mysqli_query($koneksi, $sql_notif);
                            if (mysqli_num_rows($query_notif) != 0) {
                                while ($data_riw = mysqli_fetch_row($query_notif)) {
                                    $jenis = $data_riw[0];
                                    $judul = $data_riw[1];
                                    $deskripsi = $data_riw[2];
                                    $waktu = $data_riw[3]; ?>
                                     <?php
                              if ($jenis == 0) { ?>
                                     <a href="#" class="iq-sub-card">
                                         <div class="media align-items-center">
                                             <div class="ri-drop-line">
                                             </div>
                                             <div class="media-body ml-3">
                                                 <h6 class="mb-0 "><?php echo $judul;?></h6>
                                                 <small class="float-right font-size-12"><?php echo $waktu;?></small>
                                                 <p class="mb-0"><?php echo $deskripsi;?></p>
                                             </div>
                                         </div>
                                     </a>

                                     <?php } elseif ($jenis == 1) {?>
                                     <a href="#" class="iq-sub-card">
                                         <div class="media align-items-center">
                                             <div class="ri-drop-fill">
                                             </div>
                                             <div class="media-body ml-3">
                                                 <h6 class="mb-0 "><?php echo $judul;?></h6>
                                                 <small class="float-right font-size-12"><?php echo $waktu;?></small>
                                                 <p class="mb-0"><?php echo $deskripsi;?></p>
                                             </div>
                                         </div>
                                     </a>
                                     <?php } elseif ($jenis == 2) {?>
                                     <?php
                                       $sql = "SELECT id_pesan FROM pesan WHERE `subject`='$judul' AND pesan='$deskripsi' ORDER BY tanggal DESC LIMIT 1";
                                       $query = mysqli_query($koneksi, $sql);
                                       while ($data = mysqli_fetch_row($query)) {
                                           $id_pesan = $data[0]; ?>
                                     <a href="detail-pesan-data-<?php echo $id_pesan; ?>" class="iq-sub-card">
                                         <div class="media align-items-center">
                                             <div class="ri-file-line">
                                             </div>
                                             <div class="media-body ml-3">
                                                 <h6 class="mb-0 "><?php echo $judul; ?></h6>
                                                 <small class="float-right font-size-12"><?php echo $waktu; ?></small>
                                                 <p class="mb-0"><?php echo $deskripsi; ?></p>
                                             </div>
                                         </div>
                                     </a>
                                     <?php
                                       }
                            }
                                }
                            } else {?>
                                     <a href="#" class="iq-sub-card">
                                         <div class="media align-items-center">
                                             <div class="media-body ml-3">
                                                 <h6 class="mb-0 text-center">Tidak ada notifikasi</h6>
                                             </div>
                                         </div>
                                     </a>
                                     <?php } ?>
                                 </div>
                             </div>
                         </div>
                     </li>
                 </ul>
             </div>
             <ul class="navbar-list">
                 <li class="line-height">
                     <a href="index.php" class="search-toggle iq-waves-effect d-flex align-items-center">
                         <img src="images/gambar-user/<?php echo $foto ?>" class="img-fluid rounded mr-3" alt="user">
                         <div class="caption">
                             <h6 class="mb-0 line-height"><?php echo $nama; ?></h6>
                             <p class="mb-0"><?php echo $level; ?></p>
                         </div>
                     </a>
                 </li>
             </ul>
         </nav>
     </div>
 </div>
 <!-- TOP Nav Bar END -->