<?php if ($this->session->userdata('role') == 1) {
    //wajib urut
    $this->adminlogin->proteksi_halaman();
    require_once('header_backend.php');
    require_once('topnav_backend.php');
    require_once('nav_backend.php');
    require_once('content.php');
    require_once('footer_backend.php');
} else {   
    //wajib urut
    $this->adminlogin->proteksi_halaman();
    require_once('header_backend.php');
    require_once('topnav_backend.php');
    require_once('nav_backend_user.php');
    require_once('content.php');
    require_once('footer_backend.php');
}?>