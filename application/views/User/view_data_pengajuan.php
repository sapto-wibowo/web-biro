<div class="col-md-12">
  <div class="card card-cyan">
    <div class="card-header">
      <h3 class="card-title"><?= $subtitle ?></h3>

      <div class="card-tools">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Proses Pengajuan</button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No Pengajuan</th>
            <th>Nama User</th>
            <th>Wilayah</th>
            <th>KTP</th>
            <th>STNK</th>
            <th>BPKB</th>
            <th>Surat Kuasa</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h6><i class="icon fas fa-ban"></i>';
            echo $this->session->flashdata('error');
            echo '</h6></div>';
          }

          if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h6><i class="icon fas fa-check"></i>';
            echo $this->session->flashdata('pesan');
            echo '</h6></div>';
          }
          $no = 1;
          foreach ($syarat as $key => $value) {
          ?>
            <tr>
              <td><?= $value->no_pengajuan ?></td>
              <td><?= $value->nama_user ?></td>
              <td><?= $value->nama_wilayah ?></td>
              <td class="text-center">
                <?php if ($value->ktp == 1) { ?>
                  <span class="badge bg-success"><i class="fas fa-check"></i></span>
                <?php } else { ?>
                  <span class="badge bg-danger"><i class="fas fa-check"></i></span>
                <?php } ?>
              </td>
              <td class="text-center">
                <?php if ($value->stnk == 1) { ?>
                  <span class="badge bg-success"><i class="fas fa-check"></i></span>
                <?php } else { ?>
                  <span class="badge bg-danger"><i class="fas fa-check"></i></span>
                <?php } ?>
              </td>
              <td class="text-center">
                <?php if ($value->bpkb == 1) { ?>
                  <span class="badge bg-success"><i class="fas fa-check"></i></span>
                <?php } else { ?>
                  <span class="badge bg-danger"><i class="fas fa-check"></i></span>
                <?php } ?>
              </td>
              <td class="text-center">
                <?php if ($value->surat_kuasa == 1) { ?>
                  <span class="badge bg-success"><i class="fas fa-check"></i></span>
                <?php } else { ?>
                  <span class="badge bg-danger"><i class="fas fa-check"></i></span>
                <?php } ?>
              </td>
              <td class="text-center">
                <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#modal-status<?= $value->id_syarat ?>">Proses</button>
              </td>
              <td class="text-center">
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit<?= $value->id_syarat ?>"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value->id_syarat ?>"><i class="fas fa-trash"></i></button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No Pengajuan</th>
            <th>Nama User</th>
            <th>Wilayah</th>
            <th>KTP</th>
            <th>STNK</th>
            <th>BPKB</th>
            <th>Surat Kuasa</th>
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
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-cyan">
        <h4 class="modal-title">Pengajuan User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        echo form_open('Syarat/AddData');
        ?>
        <div class="card-body">
          <div class="form-group">
            <label>No Pengajuan</label>
            <input type="text" name="no_pengajuan" value="PJ<?= time() ?>" readonly class="form-control">
          </div>
          <div class="form-group">
            <label>Nama User</label>
            <select name="nama_user" class="form-control" required>
              <option value="">--Pilih User--</option>
              <?php
              foreach ($user as $key => $value) {
              ?>
                <option value="<?= $value->id_user ?>"><?= $value->nama_user ?></option>
              <?php } ?>
            </select>
          </div>
          <?php if ($user == "" || $user == null) { ?>
          <?php } else { ?>
            <input type="text" name="id_wilayah" value="<?= $value->id_wilayah ?>" hidden>
          <?php } ?>
          <div class="form-group">
            <label>Jenis Layanan</label>
            <select name="id_layanan" class="form-control" required>
              <option value="">--Pilih jenis Layanan--</option>
              <?php
              foreach ($layanan as $key => $value) {
              ?>
                <option value="<?= $value->id_layanan ?>"><?= $value->jenis_layanan ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Nomor Kendaraan</label>
            <input type="text" name="no_polisi" class="form-control">
          </div>
          <label>Persyaratan</label><small> (Syarat Pengajuan Harus Lengkap)</small>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>KTP</label>
                <select name="ktp" class="form-control">
                  <option value="1">Sudah</option>
                  <option value="2">Belum</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>STNK</label>
                <select name="stnk" class="form-control">
                  <option value="1">Sudah</option>
                  <option value="2">Belum</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>BPKB</label>
                <select name="bpkb" class="form-control">
                  <option value="1">Sudah</option>
                  <option value="2">Belum</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Surat Kuasa</label>
                <select name="surat_kuasa" class="form-control">
                  <option value="1">Sudah</option>
                  <option value="2">Belum</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?php
      echo form_close();
      ?>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<?php foreach ($syarat as $key => $value) { ?>
  <div class="modal fade" id="modal-edit<?= $value->id_syarat ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-cyan">
          <h4 class="modal-title">Edit Pengajuan User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
          echo form_open('Syarat/edit/' . $value->id_syarat);
          ?>
          <div class="card-body">
            <div class="form-group">
              <label>No Pengajuan</label>
              <input type="text" name="no_pengajuan" value="<?= $value->no_pengajuan ?>" readonly class="form-control">
            </div>
            <div class="form-group">
              <label>Nama User</label>
              <input type="text" name="id_user" value="<?= $value->nama_user ?>" readonly class="form-control">
            </div>
            <div class="form-group">
              <label>Jenis Layanan</label>
              <input type="text" name="id_layanan" value="<?= $value->jenis_layanan ?>" readonly class="form-control">
            </div>
            <div class="form-group">
              <label>Nomor Kendaraan</label>
              <input type="text" name="no_polisi" value="<?= $value->no_polisi ?>" readonly class="form-control">
            </div>
            <label>Persyaratan</label><small> (Syarat Pengajuan Harus Lengkap)</small>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>KTP</label>
                  <select name="ktp" class="form-control">
                    <?php $ktp = $this->input->post('ktp') ? $this->input->post('ktp') : $value->ktp ?>
                    <option value="1">Sudah</option>
                    <option value="2" <?= $ktp == 2 ? 'selected' : null ?>>Belum</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>STNK</label>
                  <select name="stnk" class="form-control">
                    <?php $stnk = $this->input->post('stnk') ? $this->input->post('stnk') : $value->stnk ?>
                    <option value="1">Sudah</option>
                    <option value="2" <?= $stnk == 2 ? 'selected' : null ?>>Belum</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>BPKB</label>
                  <select name="bpkb" class="form-control">
                    <?php $bpkb = $this->input->post('bpkb') ? $this->input->post('bpkb') : $value->bpkb ?>
                    <option value="1">Sudah</option>
                    <option value="2" <?= $bpkb == 2 ? 'selected' : null ?>>Belum</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Surat Kuasa</label>
                  <select name="surat_kuasa" class="form-control">
                    <?php $surat_kuasa = $this->input->post('surat_kuasa') ? $this->input->post('surat_kuasa') : $value->surat_kuasa ?>
                    <option value="1">Sudah</option>
                    <option value="2" <?= $surat_kuasa == 2 ? 'selected' : null ?>>Belum</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?php
        echo form_close();
        ?>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
<?php } ?>
<?php foreach ($syarat as $key => $value) { ?>
  <div class="modal fade" id="modal-delete<?= $value->id_syarat ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-cyan">
          <h4 class="modal-title">Hapus Pengajuan User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h6>Apakah Anda Yakin Ingin Membatalkan Pengajuan <?= $value->nama_user ?>?</h6>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <a href="<?= base_url('syarat/delete/' . $value->id_syarat) ?>" class="btn btn-primary">Delete </a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php } ?>
<?php foreach ($syarat as $key => $value) { ?>
  <div class="modal fade" id="modal-status<?= $value->id_syarat ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-cyan">
          <h4 class="modal-title">
            Proses Pengajuan <?= $value->nama_user ?>?
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open('Syarat/syarat/' . $value->id_syarat) ?>
          <div class="form-group">
            <label>Nama Petugas</label>
            <select name="id_employee" class="form-control" required>
              <option value="">--Pilih Petugas--</option>
              <?php foreach ($employee as $key => $value) { ?>
                <option value="<?= $value->id_employee ?>"><?= $value->nama_employee ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Proses</button>
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
<?php } ?>