<body>
 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top header-inner-pages">
 <div class="container d-flex align-items-center">

<h1 class="logo me-auto"><a href="<?=base_url('website')?>">Web-Biro</a></h1>
<!-- Uncomment below if you prefer to use an image logo -->

<nav id="navbar" class="navbar">
  <ul>
    <li><a class="nav-link scrollto" href="<?=base_url('website')?>">Home</a></li>
    <?php if ($this->session->userdata('username')== "") { ?>
    <li><a class="getstarted scrollto" href="<?=base_url('auth/login_user')?>">Login/Register</a></li>
    <?php }else{?>
    <li class="dropdown" ><a class="getstarted scrollto" href="#"><?=$this->session->userdata('nama_user')?></a>
      <ul>
        <li><a href="<?=base_url('website/akun/' . $this->session->userdata('id_user') )?>" class="dropdown-item">Akun Saya</a></li>
        <li><a href="<?=base_url('website/diproses')?>" class="dropdown-item">Lacak Pengajuan</a></li>
        <li><a href="<?=base_url('website/history')?>" class="dropdown-item">History Pengajuan</a></li>
        <hr>
        <li><a href="<?=base_url('auth/signout')?>" class="dropdown-item dropdown-footer">Logout</a></li>
      </ul>
    </li>
    <?php }?>
  </ul>
  <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <br>
      <ol>
        <li><a href="<?=base_url('website')?>">Home</a></li>
        <li><?=$title?></li>
      </ol>
      <h2><?=$title?></h2>

    </div>
  </section><!-- End Breadcrumbs -->

<section class="inner-page">
<div class="content">
    <div class="container">
      <div class="row">