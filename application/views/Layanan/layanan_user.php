<div class="col-md-12">
    <div class="card card-cyan">
        <div class="card-header">
            <h3 class="card-title"><?= $subtitle ?></h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No Pengajuan</th>
                        <th>Nama User</th>
                        <th>Jenis Layanan</th>
                        <th>Nomor Kendaraan</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Biaya</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($syarat as $key => $value) {
                        $mulai = $value->tanggal;
                        $lama = $value->lama_waktu;
                        $selesai = strtotime("+$lama days", $mulai)
                    ?>
                        <tr>
                            <td><?= $value->no_pengajuan ?></td>
                            <td><?= $value->nama_user ?></td>
                            <td><?= $value->jenis_layanan ?></td>
                            <td><?= $value->no_polisi ?></td>
                            <td><?php echo format_indo(date('Y-m-d', $value->tanggal)) ?></td>
                            <td><?php echo format_indo(date('Y-m-d', $selesai)) ?></td>
                            <td>Rp <?= $value->biaya ?></td>
                            <td><a href="<?= base_url('dokumen/dokumen/' . $value->id_syarat) ?>" target="_blank" class="btn btn-default btn-sm"><i class="fas fa-print"></i> Print</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No Pengajuan</th>
                        <th>Nama User</th>
                        <th>Jenis Layanan</th>
                        <th>Nomor Kendaraan</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
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