<div class="card card-cyan">
  <div class="card-header">
    <h3 class="card-title">Data Pengajuan</h3>
  </div>
  <div class="card-body box-profile">
    <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th width='20px'>No</th>
      <th>Nama User</th>
      <th>Tanggal</th>
      <th>Wilayah</th>
      <th>Petugas</th>
      <th>Foto petugas</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
      <?php
      foreach($diproses as $key => $value) {
      ?>
    <tr>
      <td><?=$value->no_pengajuan?></td>
      <td><?=$this->session->userdata('nama_user')?></td>
      <td><?=date('d-m-Y', $value->tanggal)?></td>
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
      <a href="<?=base_url('Website/view/' . $value->id_syarat)?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
      </td>
    </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
    <th width='20px'>No</th>
      <th>Nama User</th>
      <th>Tanggal</th>
      <th>Wilayah</th>
      <th>Petugas</th>
      <th>Foto petugas</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
    </tfoot>
    </table>
  </div>
</div>