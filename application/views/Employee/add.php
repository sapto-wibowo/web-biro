<!--/.col (left) -->
<!-- right column -->
<div class="col-md-12">
  <!-- general form elements disabled -->
  <div class="card card-cyan">
    <div class="card-header">
      <h3 class="card-title">Form Tambah Data Karyawan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <?php
      if(isset($error)){
        echo'<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h6><i class="icon fas fa-check"></i>' .$error. '</h6></div>';
        }
        echo form_open_multipart('Employee/AddData')?>
        <div class="row">
          <div class="col-md-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama Karyawan</label>
              <input type="text" name="nama_employee" class="form-control" placeholder="Masukkan Nama Karyawan" value="<?=set_value('nama_employee')?>" >
              <?= form_error('nama_employee', '<small class="text-danger pl-3">', '</small>');?>
            </div>
          </div>
          <div class="col-md-6">
            <!-- text input -->
            <div class="form-group">
              <label>Wilayah</label>
                <select name="id_wilayah" class="form-control" required>
                <option value="">--Pilih Wilayah--</option>
                  <?php 
                  foreach($wilayah as $key => $value){ 
                  ?>
                  <option value="<?=$value->id_wilayah?>"><?=$value->nama_wilayah?></option>
                  <?php } ?>
                </select>  
                <?= form_error('wilayah', '<small class="text-danger pl-3">', '</small>');?>
            </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6">
            <!-- text input -->
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="Masukkan Username" value="<?=set_value('username')?>" >
              <?= form_error('username', '<small class="text-danger pl-3">', '</small>');?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Role</label>
              <select name="role" class="form-control">
                <option value="">--Pilih Role--</option>
                <option value="1">Manager</option>
                <option value="2">Karyawan</option>
              </select>
              <?= form_error('role', '<small class="text-danger pl-3">', '</small>');?>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-6">
        <div class="row ml-0">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" id="preview_gambar" name="gambar" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <img src="<?=base_url('assets/gambar/nofoto.jpg')?>" id="gambar_load" width="200px">
                </div>
            </div>
        </div> 
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" name="no_telepon" class="form-control" placeholder="Masukkan Nomor Telepon" value="<?=set_value('no_telepon')?>" >
            <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>');?>
          </div>
          </div>
      </div> 
      <div class="row">
        <div class="col-md-6">
              <div class="form-group">
              <label>Password</label>
                  <input type="password" name="password1" id="password1" class="form-control" placeholder="Masukkan Password">
                  <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');?>
              </div>
        </div>
        <div class="col-md-6">
              <div class="form-group">
              <label>Retype Password</label>
                  <input type="password" name="password2" id="password2" class="form-control" placeholder="Retype password">
                  <?= form_error('password2', '<small class="text-danger pl-3">', '</small>');?>
              </div>
        </div>
      </div>
          <div class="form_group">
              <button type="submit "class="btn btn-primary btn-xl">Simpan</button>
              <a href="<?=base_url('Employee')?>" class="btn btn-default btn-xl">Close</a>
          </div>
      <?php echo form_close()?>    
      </div>
  </div>
</div>

<script>
  function bacaGambar(input){
      if(input.files && input.files[0]){
          var reader = new FileReader();
          reader.onload =function(e){
              $('#gambar_load').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }

  $("#preview_gambar").change(function(){
      bacaGambar(this);
  })
</script>