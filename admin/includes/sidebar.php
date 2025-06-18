

<!-- Sidebar  -->
<div class="iq-sidebar">
   <div class="iq-navbar-logo d-flex justify-content-between">
      <a href="profil" class="header-logo">
         <img src="images/logo.png" class="img-fluid rounded" alt="">
      </a>
      <div class="iq-menu-bt align-self-center">
         <div class="wrapper-menu">
            <div class="main-circle"><i class="ri-menu-line"></i></div>
            <div class="hover-circle"><i class="ri-close-fill"></i></div>
         </div>
      </div>
   </div>
   <div id="sidebar-scrollbar">
      <nav class="iq-sidebar-menu">
         <ul id="iq-sidebar-toggle" class="iq-menu">
            <li class="<?php if (isset($_GET['include'])) {
    if ($include=="profil" or $include=="edit-profil") { ?> active <?php }
} ?>">
               <a href="profil" class="iq-waves-effect" aria-expanded="false"><span class="ripple rippleEffect"></span>
                  <i class="las la-user-tie iq-arrow-left"></i><span>Profil</span></a>
            </li>
            <?php if (isset($_SESSION['level'])) {
    if ($_SESSION['level']=="Superadmin") {?>
            <li class="<?php if (isset($_GET['include'])) {
        if ($include=="user" or $include=="edit-user" or $include=="detail-user" or $include=="tambah-user") { ?> active <?php }
    } ?>">
               <a href="user" class="iq-waves-effect" aria-expanded="false"><span class="ripple rippleEffect"></span>
                  <i class="las la-edit iq-arrow-left"></i><span>Pengaturan User</span></a>
            </li>
            <?php }
} ?>
            <li class="<?php if (isset($_GET['include'])) {
    if ($include=="monitor" or $include=="detail-monitor" or $include=="edit-monitor" or $include=="tambah-monitor") { ?> active <?php }
} ?>">
               <a href="monitor" class="iq-waves-effect collapsed" aria-expanded="false">
                  <i class="las la-video iq-arrow-left"></i><span>Monitoring</span></a>
            </li>
            <li class="<?php if (isset($_GET['include'])) {
    if ($include=="galeri" or $include=="detail-galeri" or $include=="edit-galeri" or $include=="tambah-galeri") { ?> active <?php }
} ?>">
               <a href="galeri" class="iq-waves-effect collapsed" aria-expanded="false">
                  <i class="las la-images iq-arrow-left"></i><span>Galeri</span></a>
            </li>
            <li class="<?php if (isset($_GET['include'])) {
    if ($include=="konten" or $include=="detail-konten" or $include=="edit-konten" or $include=="tambah-konten") { ?> active <?php }
} ?>">
               <a href="konten" class="iq-waves-effect collapsed" aria-expanded="false">
                  <i class="las la-list iq-arrow-left"></i><span>Konten</span></a>
            </li>
            <li class="<?php if (isset($_GET['include'])) {
    if ($include=="pesan" or $include=="detail-pesan") { ?> active <?php }
} ?>">
               <a href="pesan" class="iq-waves-effect collapsed" aria-expanded="false">
                  <i class="las ri-archive-drawer-line iq-arrow-left"></i><span>Pesan Masuk</span></a>
            </li>
            <li>
               <a href="keluar" class="iq-waves-effect collapsed" aria-expanded="false">
                  <i class="ion-close-circled iq-arrow-left"></i><span>Sign Out</span></a>
            </li>
         </ul>
      </nav>
      <div class="p-3"></div>
   </div>
</div>