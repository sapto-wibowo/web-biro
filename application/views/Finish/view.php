<div class="col-md-12">
<div class="card card-cyan">
    <div class="card-header">
    <h3 class="card-title"><?=$subtitle?></h3>
    <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No Pengajuan</th>
            <th>Nama User</th>
            <th>Tanggal Pengajuan</th>
            <th>Tanggal Selesai</th>
            <th>Wilayah</th>
            <th>Petugas</th>
            <th>Foto petugas</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
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
            $no = 1;
            foreach($syarat as $key => $value) {
            ?>
          <tr>
            <td><?=$value->no_pengajuan?></td>
            <td><?=$value->nama_user?></td>
            <td><?php echo format_indo(date('Y-m-d', $value->tanggal))?></td>
            <td><?php echo format_indo(date('Y-m-d', $value->finish))?></td>
            <td>
              <?=$value->nama_wilayah?>
            </td>
            <td><?=$value->nama_employee?></td>
            <td class="text-center"><img src="<?=base_url('assets/gambar/' . $value->foto)?>" width="80px" height="100px"></td>
            <td class="text-center">
              <?php if($value->status == 1) { ?>                  
                <span class="badge badge-warning">Dalam Proses</span>
              <?php }else if($value->status == 2){ ?>
                <span class="badge badge-success">Finish</span>
              <?php } ?>
            </td>
            <td class="text-center">
            <a href="<?=base_url('Finish/view/' . $value->id_syarat)?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
            </td>
          </tr>
          <?php } ?>
          </tbody>
          <tfoot>
          <tr>
          <th>No Pengajuan</th>
            <th>Nama User</th>
            <th>Tanggal Pengajuan</th>
            <th>Tanggal Selesai</th>
            <th>Wilayah</th>
            <th>Petugas</th>
            <th>Foto petugas</th>
            <th>Status</th>
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
<?php foreach ($syarat as $key => $value){?>
    <div class="modal fade" id="modal-delete<?=$value->id_syarat?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-cyan">
            <h4 class="modal-title">Hapus Proses Pengajuan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h6>Apakah Anda Yakin Ingin Membatalkan Proses Pengajuan <?=$value->nama_user?>?</h6>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="<?=base_url('finish/delete/' . $value->id_syarat)?>" class="btn btn-primary">Delete  </a>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php }?>