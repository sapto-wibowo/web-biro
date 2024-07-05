<!--/.col (left) -->
<!-- right column -->
<div class="col-md-12">
<!-- general form elements disabled -->
<div class="card card-cyan">
    <div class="card-header">
    <h3 class="card-title">Form Ganti Password <?=$employee->nama_employee?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <?php
        
    if(isset($error)){
        echo'<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h6><i class="icon fas fa-check"></i>' .$error. '</h6></div>';
        }
        echo form_open('Employee/ganti_password/' . $employee->id_employee)?>
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