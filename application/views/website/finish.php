        <div class="col-md-4">
    <div class="card card-cyan card-outline">
    <div class="card-body box-profile">
    <div class="text-center">
        <h3>PROFIL PETUGAS</h3>
    </div>
    <div class="text-center">
        <img class="profile-user-img img-fluid img-circle"
            src="<?=base_url('assets/gambar/'. $user->foto)?>"
            alt="">
    </div>
    <p></p>
    <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
            <b>Nama Petugas</b> <a class="float-right"><?=$user->nama_employee?></a>
            </li>
            <li class="list-group-item">
            <b>Wilayah</b> <a class="float-right"><?=$user->nama_wilayah?></a>
            </li>
            <li class="list-group-item">
            <b>Nomor Telepon</b> <a class="float-right"><?=$user->telepon?></a>
            </li>
        </ul>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<div class="col-md-8">
    <div class="card card-cyan card-outline">
    <div class="card-body box-profile">
        <div class="text-center">
            <h3>TIMELINE PROSES</h3>
        </div>
    <!-- The time line -->
    <div class="timeline">
            <!-- timeline time label -->
            <div class="time-label">
            <span class="bg-primary"><?php echo format_indo(date('Y-m-d', $user->date1))?></span>
            </div>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <div>
            <i class="fas fa-check bg-success"></i>
            <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> <?=date('H:i', $user->date1)?></span>
                <h3 class="timeline-header"><a href="#"><?=$user->nama_employee?></a> Meminta formulir pendaftaran di Samsat</h3>
                <div class="timeline-body">
                <?=$user->keterangan1?>
                </div>
            </div>
            </div>
          <?php
          $date2 = date('d-m-Y', $user->date2);
          $date1 = date('d-m-Y', $user->date1);
          if($date2 == $date1) { ?>
            <div>
            <i class="fas fa-check bg-success"></i>
            <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> <?=date('H:i', $user->date2)?></span>
                <h3 class="timeline-header"><a href="#"><?=$user->nama_employee?></a> Menyerahkan Formulir</h3>
                <div class="timeline-body">
                <?=$user->keterangan2?>
                </div>
            </div>
            </div>
            <?php } else { ?>
            <div class="time-label">
            <span class="bg-primary"><?php echo format_indo(date('Y-m-d', $user->date2))?></span>
            </div>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <div>
            <i class="fas fa-check bg-success"></i>
            <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> <?=date('H:i', $user->date2)?></span>
                <h3 class="timeline-header"><a href="#"><?=$user->nama_employee?></a> Menyerahkan Formulir</h3>
                <div class="timeline-body">
                <?=$user->keterangan2?>
                </div>
            </div>
            </div>
            <?php }?>
          <?php
          $date3 = date('d-m-Y', $user->date3);
          $date2 = date('d-m-Y', $user->date2);
          if($date3 == $date2) {?>
            <div>
                <i class="fas fa-check bg-success"></i>
                <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> <?=date('H:i', $user->date3)?></span>
                <h3 class="timeline-header"><a href="#"><?=$user->nama_employee?></a> Melakukan Pembayaran</h3>
                <div class="timeline-body">
                    <?=$user->keterangan3?>
                </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="time-label">
            <span class="bg-primary"><?php echo format_indo(date('Y-m-d', $user->date3))?></span>
            </div>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <div>
                <i class="fas fa-check bg-success"></i>
                <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> <?=date('H:i', $user->date3)?></span>
                <h3 class="timeline-header"><a href="#"><?=$user->nama_employee?></a> Melakukan Pembayaran</h3>
                <div class="timeline-body">
                    <?=$user->keterangan3?>
                </div>
                </div>
            </div>
            <?php } ?>
            <?php
            $date4 = date('d-m-Y', $user->date4);
            $date3 = date('d-m-Y', $user->date3);
            if($date4 == $date3){?>
            <div>
                <i class="fas fa-check bg-success"></i>
                <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> <?=date('H:i', $user->date4)?></span>
                <h3 class="timeline-header"><a href="#"><?=$user->nama_employee?></a> Proses Perpanjangan STNK Berhasil</h3>
                <div class="timeline-body">
                    <?=$user->keterangan4?>
                </div>
                </div>
            </div>
            <div class="time-label">
                <span class="bg-success"><i class="fas fa-check"></i> Proses Selesai</span>
            </div>
            <?php } else { ?>
            <div class="time-label">
            <span class="bg-primary"><?php echo format_indo(date('Y-m-d', $user->date4))?></span>
            </div>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <div>
                <i class="fas fa-check bg-success"></i>
                <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> <?=date('H:i', $user->date4)?></span>
                <h3 class="timeline-header"><a href="#"><?=$user->nama_employee?></a> Proses Perpanjangan STNK Berhasil</h3>
                <div class="timeline-body">
                    <?=$user->keterangan4?>
                </div>
                </div>
            </div>
            <div class="time-label">
                <span class="bg-success"><i class="fas fa-check"></i> Proses Selesai</span>
            </div>
            <?php } ?>
        </div>
    </div>
    </div>
</div>