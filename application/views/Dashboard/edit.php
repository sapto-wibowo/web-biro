<!--/.col (left) -->
<!-- right column -->
<div class="col-md-12">
<!-- general form elements disabled -->
<div class="card card-cyan">
    <div class="card-header">
    <h3 class="card-title">Form Edit Data Karyawan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <?php
        
    if(isset($error)){
        echo'<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h6><i class="icon fas fa-check"></i>' .$error. '</h6></div>';
        }
        echo form_open_multipart('Dashboard/Edit/' . $employee->id_employee)?>
        <div class="row">
          <div class="col-md-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="hidden" name="id_employee" value="<?=$employee->id_employee?>">
              <input type="text" name="nama_employee" class="form-control" placeholder="Masukkan Nama Karyawan" value="<?=$employee->nama_employee?>" >
              <?= form_error('nama_employee', '<small class="text-danger pl-3">', '</small>');?>
            </div>
          </div>
          <div class="col-md-6">
            <!-- text input -->
            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="no_telepon" class="form-control" placeholder="Masukkan Nomor Telepon" value="<?=$employee->telepon?>" >
                <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>');?>
            </div>
            </div>
          </div>
      <div class="row">
          <div class="col-md-6">
            <!-- text input -->
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="Masukkan Username" value="<?=$employee->username?>" >
              <?= form_error('username', '<small class="text-danger pl-3">', '</small>');?>
            </div>
          </div>
          <div class="col-md-6">
          <div class="row ml-0">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" id="preview_gambar" name="gambar" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <img src="<?=base_url('assets/gambar/' . $employee->foto)?>" id="gambar_load" width="200px">
                </div>
            </div>
        </div>
        </div>
      </div>
          <div class="form_group">
              <button type="submit "class="btn btn-primary btn-xl">Simpan</button>
              <a href="<?=base_url('Dashboard/ganti_password/' . $employee->id_employee)?>" class="btn btn-success btn-xl">Ganti Password</a>
              <a href="<?=base_url('Dashboard')?>" class="btn btn-default btn-xl">Close</a>
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