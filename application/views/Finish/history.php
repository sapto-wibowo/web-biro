<div class="col-sm-12">
<?php
if($this->session->flashdata('pesan')){
    echo'<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h6><i class="icon fas fa-check"></i>';
    echo $this->session->flashdata('pesan'); 
    echo'</h6></div>';
    } 
?>
<div class="card card-cyan card-tabs">
  <div class="card-header p-0 pt-1">
    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Proses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">TimeLine</a>
      </li>
    </ul>
  </div>
<div class="card-body">
  <div class="tab-content" id="custom-tabs-one-tabContent">
    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
      <div class="row">
                <div class="col-12">
                  <h4>
                    <?=$user->no_pengajuan?> ~ <?=$user->nama_user?>
                    <small class="float-right"><?php echo format_indo(date('Y-m-d', $user->tanggal))?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 2%">
                          #
                      <th style="width: 25%">
                          Petugas
                      </th>
                      <th style="width: 55%">
                          Prosedur
                      </th>
                      <th style="width: 10%" class="text-center">
                          Status
                      </th>
                      <th style="width: 8%">
                          Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                        <img src="<?=base_url('assets/gambar/' . $user->foto)?>" class="table-avatar" width="100px" height="50px"> <?=$user->nama_employee?>
                      </td>
                      <td>
                        Meminta formulir pendaftaran di Samsat
                      </td>
                      <td class="text-center">
                        <?php if($user->status1 == 1) { ?>
                          <span class="badge badge-success"><i class="fas fa-check"></i></span>
                        <?php } else { ?>
                          <span class="badge badge-danger"><i class="fas fa-check"></i></span>
                        <?php } ?>
                      </td>
                      <td>
                      <button type="button" class="btn bg-gradient-success btn-xs" data-toggle="modal" data-target="#modal-keterangan1<?=$user->id_syarat?>">Done</button>
                      </td>
                  </tr>
                  <?php if($user->status1 == 1) { ?>
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                      <img src="<?=base_url('assets/gambar/' . $user->foto)?>" class="table-avatar" width="100px" height="50px"> <?=$user->nama_employee?>
                      </td>
                      <td>
                        Menyerahkan Formulir beserta Dokumen Syarat Perpanjang STNK
                      </td>
                      <td class="text-center">
                        <?php if($user->status2 == 1) { ?>
                          <span class="badge badge-success"><i class="fas fa-check"></i></span>
                        <?php } else { ?>
                          <span class="badge badge-danger"><i class="fas fa-check"></i></span>
                        <?php } ?>
                      </td>
                      <td>
                      <button type="button" class="btn bg-gradient-success btn-xs" data-toggle="modal" data-target="#modal-keterangan2<?=$user->id_syarat?>">Done</button>
                      </td>
                  </tr>
                  <?php } ?>
                  <?php if($user->status2 == 1) { ?>
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                      <img src="<?=base_url('assets/gambar/' . $user->foto)?>" class="table-avatar" width="100px" height="50px"> <?=$user->nama_employee?>
                      </td>
                      <td>
                        Pembayaran Pajak Sesuai Dengan Nominal yang tertera pada lembar pembayaran
                      </td>
                      <td class="text-center">
                        <?php if($user->status3 == 1) { ?>
                          <span class="badge badge-success"><i class="fas fa-check"></i></span>
                        <?php } else { ?>
                          <span class="badge badge-danger"><i class="fas fa-check"></i></span>
                        <?php } ?>
                      </td>
                      <td>
                      <button type="button" class="btn bg-gradient-success btn-xs" data-toggle="modal" data-target="#modal-keterangan3<?=$user->id_syarat?>">Done</button>
                      </td>
                  </tr>
                  <?php }?>
                  <?php if($user->status3 == 1) { ?>
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                      <img src="<?=base_url('assets/gambar/' . $user->foto)?>" class="table-avatar" width="100px" height="50px"> <?=$user->nama_employee?>
                      </td>
                      <td>
                        Proses Perpanjang STNK sudah selesai dan sudah bisa di ambil
                      </td>
                      <td class="text-center">
                        <?php if($user->status4 == 1) { ?>
                          <span class="badge badge-success"><i class="fas fa-check"></i></span>
                        <?php } else { ?>
                          <span class="badge badge-danger"><i class="fas fa-check"></i></span>
                        <?php } ?>
                      </td>
                      <td>
                      <button type="button" class="btn bg-gradient-success btn-xs" data-toggle="modal" data-target="#modal-keterangan4<?=$user->id_syarat?>">Done</button>
                      </td>
                  </tr>
                  <?php }?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
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
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->
    </div>
  </div>
</div>
</div>
