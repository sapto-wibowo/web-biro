<div class="col-md-12">
    <div class="card card-cyan">
        <div class="card-header">
            <h3 class="card-title"><?= $subtitle ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i>Tambah Layanan</button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width='20px'>No</th>
                        <th>Jenis Layanan</th>
                        <th>Lama Proses</th>
                        <th>Biaya</th>
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
                    foreach ($layanan as $key => $value) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $value->jenis_layanan ?></td>
                            <td><?= $value->lama_waktu ?> Hari</td>
                            <td>Rp <?= $value->biaya ?></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit<?= $value->id_layanan ?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value->id_layanan ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th width='20px'>No</th>
                        <th>Jenis Layanan</th>
                        <th>Lama Proses</th>
                        <th>Biaya</th>
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
                <h4 class="modal-title">Tambah Data Layanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('Layanan/AddData');
                ?>
                <div class="card-body">
                    <div class="form-group">
                        <label>Jenis Layanan</label>
                        <input type="text" name="jenis_layanan" class="form-control" placeholder="Masukkan Jenis Layanan" required>
                    </div>
                    <div class="form-group">
                        <label>Lama Proses</label>
                        <input type="text" name="lama_waktu" class="form-control" placeholder="Masukkan Lama Proses" required>
                    </div>
                    <div class="form-group">
                        <label>Biaya</label>
                        <input type="text" name="biaya" class="form-control" placeholder="Masukkan Biaya" required>
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
<?php foreach ($layanan as $key => $value) { ?>
    <div class="modal fade" id="modal-edit<?= $value->id_layanan ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-cyan">
                    <h4 class="modal-title">Edit Data Layanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('layanan/edit/' . $value->id_layanan);
                    ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jenis Layanan</label>
                            <input type="text" name="jenis_layanan" value="<?= $value->jenis_layanan ?>" class="form-control" placeholder="Masukkan Jenis Layanan" required>
                        </div>
                        <div class="form-group">
                            <label>Lama Proses</label>
                            <input type="text" name="lama_waktu" value="<?= $value->lama_waktu ?>" class="form-control" placeholder="Masukkan Lama Proses" required>
                        </div>
                        <div class="form-group">
                            <label>Biaya</label>
                            <input type="text" name="biaya" value="<?= $value->biaya ?>" class="form-control" placeholder="Masukkan Biaya" required>
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
    <!-- /.modal-dialog -->
<?php } ?>

<!-- /.modal -->
<?php foreach ($layanan as $key => $value) { ?>
    <div class="modal fade" id="modal-delete<?= $value->id_layanan ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-cyan">
                    <h4 class="modal-title">Delete <?= $value->jenis_layanan ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Apakah Anda Yakin Ingin Menghapus Data Ini...?</h6>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('layanan/delete/' . $value->id_layanan) ?>" class="btn btn-primary">Delete </a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>