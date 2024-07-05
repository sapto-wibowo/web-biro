<div class="col-md-12">
<div class="card card-cyan">
    <div class="card-header">
    <h3 class="card-title"><?=$subtitle?></h3>

    <div class="card-tools">
        <a href="<?=base_url('user/AddData')?>" class="btn btn-primary"><i class="fas fa-plus"></i>
            Tambah User</a>
    </div>
    <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <?php 
      if($this->session->flashdata('pesan')){
          echo'<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h6><i class="icon fas fa-check"></i>';
          echo $this->session->flashdata('pesan'); 
          echo'</h6></div>';
        } ?>
        <thead>
        <tr>
          <th width='20px'>No</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Telepon</th>
          <th width = '200px'>Alamat</th>
          <th>Status</th>
          <th>Tanggal Register</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
          $no = 1;
          foreach ($user as $key =>$value){
        ?>
          <tr>
              <td class="text-center"><?=$no++?></td>
              <td><?=$value->nama_user?></td>
              <td><?=$value->username?></td>
              <td><?=$value->no_telepon?></td>
              <td><?=$value->kode_wilayah?> - <?=$value->jalan?>, <?=$value->kelurahan?>, <?=$value->kecamatan?></td>
              <td class="text-center">
              <?php if ($value->is_active == '1') { ?>
                <button type="button" class="btn bg-gradient-success btn-xs" data-toggle="modal" data-target="#modal-status<?=$value->id_user?>">Active</button>
              <?php }else{ ?>
                <button type="button" class="btn bg-gradient-danger btn-xs" data-toggle="modal" data-target="#modal-status<?=$value->id_user?>">Unactive</button>
                <?php } ?>
              </td>
              <td><?php echo format_indo(date('Y-m-d', $value->date_created));?></td>
              </td><td class="text-center">
              <a href="<?=base_url('User/Edit/' . $value->id_user )?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
              <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete<?=$value->id_user?>"><i class="fas fa-trash"></i></button>
              </td>
          </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr>
        <th width='20px'>No</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Telepon</th>
          <th width = '200px'>Alamat</th>
          <th>Status</th>
          <th>Tanggal Register</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
<?php foreach ($user as $key => $value){?>
    <div class="modal fade" id="modal-delete<?=$value->id_user?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-cyan">
            <h4 class="modal-title">Delete <?=$value->nama_user?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h6>Apakah Anda Yakin Ingin Menghapus Data Ini...?</h6>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="<?=base_url('user/delete/' . $value->id_user)?>" class="btn btn-primary">Delete</a>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php }?>
<?php foreach ($user as $key => $value){?>
    <div class="modal fade" id="modal-status<?=$value->id_user?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-cyan">
            <h4 class="modal-title">
              <?php if($value->is_active == 1) { ?>
                Unactive <?=$value->nama_user?>
              <?php } else { ?>
                Active <?=$value->nama_user?>
              <?php } ?>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <?php echo form_open('User/is_active/' . $value->id_user)?>
            <h6>
              <?php if($value->is_active == 1) { ?>
                Apakah Anda Yakin Ingin Unactive <?=$value->nama_user?> ?
                <input type="text" name="is_active" value="0" hidden>
              <?php } else { ?>
                Apakah Anda Yakin Ingin Active <?=$value->nama_user?> ?
                <input type="text" name="is_active" value="1" hidden>
              <?php } ?>?
            </h6>
        </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
          <?php
              echo form_close();
              ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php }?>