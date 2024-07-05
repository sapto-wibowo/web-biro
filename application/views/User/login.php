
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition mt-4 bg-cyan">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="card card-primary card-outline">
    <div class="card-header text-center">
      <div>
      <img src="<?=base_url()?>assets/gambar/logo.jpg" alt="" width="180px" height="200px">
      </div>
      <a href="<?=base_url()?>assets/index2.html" class="h1 text-cyan"><b>LOGIN</b></a>
    </div>
    <div class="card-body">
      <?php 
      if($this->session->flashdata('error')){
        echo'<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6><i class="icon fas fa-ban"></i>';
        echo $this->session->flashdata('error'); 
        echo'</h6></div>';
      }

          if($this->session->flashdata('pesan')){
              echo'<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h6><i class="icon fas fa-check"></i>';
              echo $this->session->flashdata('pesan'); 
              echo'</h6></div>';
            } 
      echo form_open('auth/login_user') ?>
        <div class="form-group mb-3">
          <label class="text-cyan">Username</label>
          <input type="username" name="username" id="username" class="form-control" placeholder="Masukkan Username" value="<?=set_value('username')?>">
          <?= form_error('username', '<small class="text-danger pl-3">', '</small>');?>
        </div>
        <div class="form-group mb-3">
          <label class="text-cyan">Password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <?= form_error('password', '<small class="text-danger pl-3">', '</small>');?>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close();?>
      <br>
      <div class="row">
        <div class="col-12">
        <a href="<?=base_url('auth/register_user')?>" class="btn btn-primary btn-block">Register a new membership</a>
        </div>
        </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
  </div>

<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<script>
  window.setTimeout(function(){$(".alert").fadeTo(500,0).slideUp(500,function() {$(this).remove();});}, 3000)
</script>
</body>
</html>
