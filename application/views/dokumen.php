<style>
    hr {
        margin-top: 0 !important;
        margin-bottom: 3px !important;
        border: 0 !important;
        border-top: 1px solid black !important;
    }

    p.dashed {
        border-style: dashed;
    }
</style>
<div class="col-12">
    <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-md-2 ml-3">
                <img src="<?= base_url() ?>assets/gambar/logo.jpg" width="150px" height="150px" alt="">
            </div>
            <div class="col-md-8 text-center">
                <h2><Strong>BERKAT</Strong></h2> <br>
                <p>Layanan Jasa Surat Kendaraan Bermotor <br>
                    Gedung Koperasi Serba Usaha <br>
                    Jl. Raya Ragunan No. B1, Pasar Minggu, Jakarta Selatan 12540 <br>
                    <i class="fas fa-phone"></i><strong> 021-7811366</strong>
                </p>
            </div>
        </div>
        <hr>
        <hr>
        <br>
        <u>
            <h4 class="text-center"><strong>TANDA TERIMA</strong></h4>
        </u>
        <div class="row">
            <div class="col-md-5 ml-5">
                <u><strong>No. Reg : <?= $print->no_pengajuan ?></strong></u>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <u><strong>No. Polisi : <?= $print->no_polisi ?></strong></u>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4 ml-5">
                <p>BPKB Asli a/n <br>
                    STNK Asli a/n <br>
                    KTP Asli a/n <br>
                    S. Kuasa / SIUP / NPWP / Domisili Asli a/n</p>
            </div>
            <div class="col-md-6">
                : <?= $print->nama_user ?><br>
                : <?= $print->nama_user ?><br>
                : <?= $print->nama_user ?><br>
                : <?= $print->nama_user ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="custom-control custom-checkbox text-center">
                    <input class="custom-control-input" type="checkbox" id="customCheckbox1">
                    <label for="customCheckbox1" class="custom-control-label">Cek Fisik</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="customCheckbox1">
                    <label for="customCheckbox1" class="custom-control-label">Kwintansi Jual Beli</label>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12 ml-5">
                <u><strong>Jenis Proses</strong></u>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="customCheckbox1">
                    <p for="customCheckbox1" class="custom-control-label">Perpanjang Pajak</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="customCheckbox1">
                    <p for="customCheckbox1" class="custom-control-label">Tukar Nama</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="customCheckbox1">
                    <p for="customCheckbox1" class="custom-control-label">Pindah Alamat</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="customCheckbox1">
                    <p for="customCheckbox1" class="custom-control-label">STNK Hilang</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="customCheckbox1">
                    <p for="customCheckbox1" class="custom-control-label">Mutasi</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="customCheckbox1">
                    <p for="customCheckbox1" class="custom-control-label">Lainnya .......................................</p>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12 ml-5">
                <u><strong>Uang Tunai Sebesar</strong></u> <strong> Rp</strong>........................................................................................................................................................ Sebagai DP
            </div>
            <div class="col-md-4 ml-5">
                <p>(</p>
            </div>
            <div class="col-md-6 text-right">
                <p>)</p>
            </div>
        </div><br>
        <?php
        $mulai = $print->tanggal;
        $lama = $print->lama_waktu + 1;
        $selesai = strtotime("+$lama days", $mulai) ?>
        <div class="row">
            <div class="col-md-12 ml-5">
                <u><strong>Berkas Selesai Pada Tanggal</strong></u> <strong><?php echo format_indo(date('Y-m-d', $selesai)) ?></strong>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12 ml-5">
                <u><strong>Tarif Progresif</strong></u>
            </div>
            <div class="col-md-2 ml-5">
                <p>- Kendaraan 1 &nbsp;&nbsp; 2% <br>
                    - Kendaraan 2 &nbsp;&nbsp; 2.5% <br>
                    - Kendaraan 3 &nbsp;&nbsp; 3% <br>
                    - Kendaraan 4 &nbsp;&nbsp; 3.5% <br>
                    - DST</p>
            </div>
            <div class="col-md-8">
                <p>Dari harga tabel<br>
                    Dari harga tabel<br>
                    Dari harga tabel<br>
                    Dari harga tabel</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 ml-5" style="border: 1px solid black;">
                Nomor Rekening BCA <br>
                5540.1245.92 <br>
                A/N Berty N Tuyu
            </div>
            <div class="col-md-6 text-right">
                <p>Jakarta, <?php echo format_indo(date('Y-m-d', $print->tanggal)) ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 ml-5">
                <strong>Jam Buka</strong> <br>
                <div class="row">
                    <div class="col-md-6">
                        Senin - Jumat <br>
                        Sabtu
                    </div>
                    <div class="col-md-6">
                        : 08.00 - 19.00 <br>
                        : 08.00 - 14.00
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 ml-5">
                <small>*Simpan tanda terima ini sebagai bukti pengambilan berkas anda <br>
                    **Pengitungan biaya yang kami berikan bersifat sementara <br>
                    ***Kami tidak bertanggung jawab apabila dokumen diragukan</small>
            </div>
            <div class="col-md-6 text-right">
                <div class="row">
                    <div class="col-md-5 ml-5">
                        <p>(</p>
                    </div>
                    <div class="col-md-5 text-right">
                        <p>)</p>
                    </div>
                </div>
            </div>
        </div><br>
        <p class="dashed"></p>
    </div>
    <!-- /.invoice -->
</div><!-- /.col -->
<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>