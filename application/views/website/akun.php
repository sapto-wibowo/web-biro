<!--/.col (left) -->
<!-- right column -->
<div class="col-md-12">
<!-- general form elements disabled -->
<div class="card card-cyan">
    <div class="card-header">
    <h3 class="card-title">Ubah Data </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <?php 
    if(isset($error)){
        echo'<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h6><i class="icon fas fa-check"></i>' .$error. '</h6></div>';
        }
        echo form_open_multipart('website/akun/'. $user->id_user)?>
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="hidden" name="id_user" value="<?=$user->id_user?>">
                <input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="Masukkan Nama Lengkap" value="<?=$user->nama_user?>">
                <?= form_error('nama_user', '<small class="text-danger pl-3">', '</small>');?>
              </div>  
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Jalan, RT/RW</label>
                <input type="text" name="jalan" id="jalan" class="form-control" placeholder="Masukkan Nama Jalan, RT/RW" value="<?=$user->jalan?>">
                <?= form_error('jalan', '<small class="text-danger pl-3">', '</small>');?>
              </div> 
            </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label>Nomor Telepon</label>
              <input type="text" name="no_telepon" id="no_telepon" class="form-control" placeholder="Masukkan Nomor Telepon" value="<?=$user->no_telepon?>">
              <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>');?>
            </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
            <label>Kelurahan</label>
              <input type="text" name="kelurahan" id="kelurahan" class="form-control" placeholder="Masukkan Kelurahan" value="<?=$user->kelurahan?>">
              <?= form_error('kelurahan', '<small class="text-danger pl-3">', '</small>');?>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
            <label>Kecamatan</label>
              <input type="text" name="kecamatan" id="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" value="<?=$user->kecamatan?>">
              <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>');?>
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
          <label>Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" value="<?=$user->username?>">
            <?= form_error('username', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Wilayah</label>
              <select name="id_wilayah" id="wilayah" class="form-control">
              <option value="<?=$user->id_wilayah?>"><?=$user->nama_wilayah?></option>
                <?php 
                foreach($wilayah as $key => $value){ 
                ?>
                <option value="<?=$value->id_wilayah?>"><?=$value->nama_wilayah?></option>
                <?php } ?>
              </select>
          </div>
        </div>
      </div>
        <div class="form_group">
            <button type="submit "class="btn btn-primary btn-xl">Simpan</button>
            <a href="<?=base_url('website/ganti_password/' . $user->id_user)?>" class="btn btn-success btn-xl">Ganti Password</a>
            <a href="<?=base_url('website')?>" class="btn btn-default btn-xl">Close</a>
        </div>
    <?php echo form_close()?>    
    </div>
</div>
</div>
