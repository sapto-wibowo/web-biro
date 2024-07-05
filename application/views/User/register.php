
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

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
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="card card-primary card-outline">
    <div class="card-header text-center">
      <a href="<?=base_url()?>assets/index2.html" class="h1 text-cyan float-left"><b>REGISTRASI</b></a>
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
      echo form_open('auth/register_user') ?>
      <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="text-cyan">Nama Lengkap</label>
                <input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="Masukkan Nama Lengkap" value="<?= set_value('nama_user')?>">
                <?= form_error('nama_user', '<small class="text-danger pl-3">', '</small>');?>
              </div>  
            </div>
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="text-cyan">Nama Jalan, RT/RW</label>
                <input type="text" name="jalan" id="jalan" class="form-control" placeholder="Masukkan Nama Jalan, RT/RW" value="<?= set_value('jalan')?>">
                <?= form_error('jalan', '<small class="text-danger pl-3">', '</small>');?>
              </div> 
            </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
            <label class="text-cyan">Nomor Telepon</label>
              <input type="text" name="no_telepon" id="no_telepon" class="form-control" placeholder="Masukkan Nomor Telepon" value="<?= set_value('no_telepon')?>">
              <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>');?>
            </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
            <div class="form-group mb-3">
            <label class="text-cyan">Kelurahan</label>
              <input type="text" name="kelurahan" id="kelurahan" class="form-control" placeholder="Masukkan Kelurahan" value="<?= set_value('kelurahan')?>">
              <?= form_error('kelurahan', '<small class="text-danger pl-3">', '</small>');?>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group mb-3">
            <label class="text-cyan">Kecamatan</label>
              <input type="text" name="kecamatan" id="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" value="<?= set_value('kecamatan')?>">
              <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>');?>
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group mb-3">
          <label class="text-cyan">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" value="<?= set_value('username')?>">
            <?= form_error('username', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group mb-3">
            <label class="text-cyan">Wilayah</label>
              <select name="id_wilayah" id="wilayah" class="form-control">
              <option value="">--Pilih Wilayah--</option>
                <?php 
                foreach($wilayah as $key => $value){ 
                ?>
                <option value="<?=$value->id_wilayah?>"><?=$value->nama_wilayah?></option>
                <?php } ?>
              </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group mb-3">
            <label class="text-cyan">Password</label>
            <input type="password" name="password1" id="password1" class="form-control" placeholder="Masukkan Password">
            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group mb-3">
            <label class="text-cyan">Ulangi Password</label>
            <input type="password" name="password2" id="password2" class="form-control" placeholder="Retype password">
            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close()?>
      <br>
      <div class="row">
          <div class="col-12">
            <a href="<?=base_url('auth/login_user')?>" class="btn btn-primary btn-block">I already have a membership</a>
          </div>
        <!-- /.col -->
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
  </div>
<script>
  window.setTimeout(function(){$(".alert").fadeTo(500,0).slideUp(500,function() {$(this).remove();});}, 3000)
</script>
<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>
