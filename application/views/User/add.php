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
    if($this->session->flashdata('error')){
        echo'<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6><i class="icon fas fa-ban"></i>';
        echo $this->session->flashdata('error'); 
        echo'</h6></div>';
      }
    echo form_open_multipart('User/AddData')?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="Masukkan Nama Lengkap" value="<?= set_value('nama_user')?>">
            <?= form_error('nama_user', '<small class="text-danger pl-3">', '</small>');?>
            </div>  
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label>Nama Jalan, RT/RW</label>
            <input type="text" name="jalan" id="jalan" class="form-control" placeholder="Masukkan Nama Jalan, RT/RW" value="<?= set_value('jalan')?>">
            <?= form_error('jalan', '<small class="text-danger pl-3">', '</small>');?>
            </div> 
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label>Nomor Telepon</label>
              <input type="text" name="no_telepon" id="no_telepon" class="form-control" placeholder="Masukkan Nomor Telepon" value="<?= set_value('no_telepon')?>">
              <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>');?>
            </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
            <label>Kelurahan</label>
              <input type="text" name="kelurahan" id="kelurahan" class="form-control" placeholder="Masukkan Kelurahan" value="<?= set_value('kelurahan')?>">
              <?= form_error('kelurahan', '<small class="text-danger pl-3">', '</small>');?>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
            <label>Kecamatan</label>
              <input type="text" name="kecamatan" id="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" value="<?= set_value('kecamatan')?>">
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
            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" value="<?= set_value('username')?>">
            <?= form_error('username', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Wilayah</label>
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
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password1" id="password1" class="form-control" placeholder="Masukkan Password">
            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Ulangi Password</label>
            <input type="password" name="password2" id="password2" class="form-control" placeholder="Retype password">
            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
      </div> 
        <div class="form_group">
            <button type="submit "class="btn btn-primary btn-xl">Simpan</button>
            <a href="<?=base_url('User')?>" class="btn btn-default btn-xl">Close</a>
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