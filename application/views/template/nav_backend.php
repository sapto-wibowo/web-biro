 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-cyan elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link bg-cyan">
     <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">AdminLTE 3</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="<?= base_url('assets/gambar/' . $this->session->userdata('foto')) ?>" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block"><?= $this->session->userdata('nama_employee') ?></a>
       </div>
     </div>
     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
           <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?= base_url('wilayah') ?>" class="nav-link <?= $menu == 'wilayah' ? 'active' : '' ?>">
             <i class="nav-icon fas fa-map"></i>
             <p>
               Wilayah
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?= base_url('layanan') ?>" class="nav-link <?= $menu == 'layanan' ? 'active' : '' ?>">
             <i class="nav-icon fas fa-list"></i>
             <p>
               Layanan
             </p>
           </a>
         </li>
         <li class="nav-item <?= $menu == 'masterdata' ? 'menu-open' : '' ?>">
           <a href="#" class="nav-link <?= $menu == 'masterdata' ? 'active' : '' ?>">
             <i class="nav-icon fas fa-table"></i>
             <p>
               Data Transaksi
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= base_url('User') ?>" class="nav-link <?= $submenu == 'User' ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>
                   Data User
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= base_url('Syarat') ?>" class="nav-link <?= $submenu == 'DataPengajuan' ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>
                   Data Pengajuan User
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= base_url('Layanan/layanan_user') ?>" class="nav-link <?= $submenu == 'DataLayanan' ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>
                   Data Layanan User
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= base_url('Proses') ?>" class="nav-link <?= $submenu == 'Proses' ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>
                   Dalam Proses
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?= base_url('Finish') ?>" class="nav-link <?= $submenu == 'Finish' ? 'active' : '' ?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>
                   Finish
                 </p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="<?= base_url('employee') ?>" class="nav-link <?= $menu == 'employee' ? 'active' : '' ?>">
             <i class="nav-icon fas fa-user-alt"></i>
             <p>
               Employee
             </p>
           </a>
         </li>
         </li>
         <li class="nav-item">
           <a href="<?= base_url('auth/logout') ?>" class="nav-link">
             <i class="nav-icon fas fa-sign-out-alt"></i>
             <p>
               Log Out
             </p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0"><?= $title ?></h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active"><?= $title ?></li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <div class="content">
     <div class="container-fluid">
       <div class="row">