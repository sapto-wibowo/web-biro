<!-- Small boxes (Stat box) -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?=$total_employee?></h3>

        <p>Karyawan</p>
      </div>
      <div class="icon">
        <i class="ion ion-person"></i>
      </div>
      <a href="<?=base_url('Employee')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
  </div><!-- Small boxes (Stat box) -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?=$total_user?></h3>

        <p>Pengguna</p>
      </div>
      <div class="icon">
        <i class="fas fa-user-friends"></i>
      </div>
      <a href="<?=base_url('User')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div><!-- Small boxes (Stat box) -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?=$total_belum_proses?></h3>

        <p>Belum Proses</p>
      </div>
      <div class="icon">
        <i class="ion ion-alert"></i>
      </div>
      <a href="<?=base_url('Syarat')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div><!-- Small boxes (Stat box) -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?=$total_sudah_proses?></h3>

        <p>Dalam Proses</p>
      </div>
      <div class="icon">
        <i class="ion ion-load-b"></i>
      </div>
      <a href="<?=base_url('Proses')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-md-4">
 <!-- Profile Image -->
 <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?=base_url('assets/gambar/'. $this->session->userdata('foto'))?>"
                       alt="">
                </div>

                <h3 class="profile-username text-center"><?=$this->session->userdata('nama_employee')?></h3>

                <p class="text-muted text-center"><?php if($this->session->userdata('role') == '1'){
                                echo '<span class="badge bg-success">Manager</span>';
                            }else{
                                echo '<span class="badge bg-primary">Karyawan</span>';
                            }
                            ?></td></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Wilayah</b> <a class="float-right"><?=$this->session->userdata('wilayah')?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Nomor Telepon</b> <a class="float-right"><?=$this->session->userdata('telepon')?></a>
                  </li>
                </ul>

                <a href="<?=base_url('Dashboard/edit/' . $this->session->userdata('id_employee'))?>" class="btn btn-primary btn-block"><b>Ubah Profil</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
<div class="col-md-8">
  
</div>