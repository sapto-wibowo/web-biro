<div class="col-md-12">
    <div class="card card-cyan">
        <div class="card-header">
            <h3 class="card-title"><?= $subtitle ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i>Tambah Wilayah</button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width='20px'>No</th>
                        <th>Kode Wilayah</th>
                        <th>Nama Wilayah</th>
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
                    foreach ($wilayah as $key => $value) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $value->kode_wilayah ?></td>
                            <td><?= $value->nama_wilayah ?></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit<?= $value->id_wilayah ?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value->id_wilayah ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th width='20px'>No</th>
                        <th>Kode Wilayah</th>
                        <th>Nama Wilayah</th>
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
                <h4 class="modal-title">Tambah Data Wilayah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('Wilayah/AddData');
                ?>
                <div class="card-body">
                    <div class="form-group">
                        <label>Kode Wilayah</label>
                        <input type="text" name="kode_wilayah" class="form-control" placeholder="Masukkan Kode Wilayah" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Wilayah</label>
                        <input type="text" name="nama_wilayah" class="form-control" placeholder="Masukkan Nama Wilayah" required>
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
<?php foreach ($wilayah as $key => $value) { ?>
    <div class="modal fade" id="modal-edit<?= $value->id_wilayah ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-cyan">
                    <h4 class="modal-title">Edit Data Wilayah</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('wilayah/edit/' . $value->id_wilayah);
                    ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kode Wilayah</label>
                            <input type="text" name="kode_wilayah" value="<?= $value->kode_wilayah ?>" class="form-control" placeholder="Masukkan Kode Wilayah" required>
                        </div>
                        <div class="form-group">
                            <label>Nama wilayah</label>
                            <input type="text" name="nama_wilayah" value="<?= $value->nama_wilayah ?>" class="form-control" placeholder="Masukkan Nama Wilayah" required>
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
<?php foreach ($wilayah as $key => $value) { ?>
    <div class="modal fade" id="modal-delete<?= $value->id_wilayah ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-cyan">
                    <h4 class="modal-title">Delete <?= $value->nama_wilayah ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Apakah Anda Yakin Ingin Menghapus Data Ini...?</h6>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('wilayah/delete/' . $value->id_wilayah) ?>" class="btn btn-primary">Delete </a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>