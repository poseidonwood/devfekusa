<?php
require 'connect.php';
require 'action/action_count.php';

$counts = new counts();
$counts->setconfig($konek);

$idBagian = @$_SESSION['id_bagian'];
$idAdmin = @$_SESSION['id_admin'];


$query = "SELECT namaBagian FROM bagian WHERE id_bagian='$idBagian'";
$execute = $konek->query($query);
$dataBagian = "";
if ($execute->num_rows > 0) {
  $dataResultBagian = $execute->fetch_array(MYSQLI_ASSOC);
  $dataBagian = $dataResultBagian['namaBagian'];
} else {
  $dataBagian = "Admininistator";
}


$query = "SELECT id_admin,nik,username,nama_lengkap,password,nik FROM user WHERE id_admin='$idAdmin'";
$execute = $konek->query($query);
if ($execute->num_rows > 0) {
  $data = $execute->fetch_array(MYSQLI_ASSOC);
}


if ($_SESSION['role'] == "1") {
?>

  <div class="page-content fade-in-up">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="ibox bg-success color-white widget-stat">
          <div class="ibox-body">
            <h2 class="m-b-5 font-strong">
              <?php echo count($counts->getCountPegawaiBagian($idBagian)) ?>
            </h2>
            <div class="m-b-5">Pegawai</div><i class="ti-user widget-stat-icon"></i>
          </div>
        </div>
      </div>

    </div>
    <div class="ibox">
      <div class="ibox-head">
        <div class="ibox-title">Pilih Tahun Untuk Menampilkan Chart</div>
        <div style="float:right;">
          <select class="form-control-sm" name="pilih" id="pilihHasilBeranda">
            <option disabled selected value="">-- Pilih Tahun --</option>;
            <?php
            for ($i = date('Y') - 5; $i < date('Y') + 1; $i++) {
              echo "<option value=\"$i\">$i</option>";
            }
            ?>
          </select>
        </div>
      </div>

    </div>
    <div id="valueHasilBeranda">
    </div>
  </div>

  <div class="page-content fade-in-up">
    <div class="row">
      <div class="col-lg-3 col-md-4">
        <div class="ibox">
          <div class="ibox-body text-center">
            <div class="m-t-20">
              <img class="img-circle" src="./assets/img/admin-avatar.png" />
            </div>
            <h5 class="font-strong m-b-10 m-t-10"><?php echo $_SESSION['nama_lengkap']; ?></h5>
            <div class="m-b-20 text-muted"><?php echo $dataBagian; ?></div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-8">
        <div class="ibox">
          <div class="ibox-body">
            <ul class="nav nav-tabs tabs-line">
              <li class="nav-item">
                <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i> Overview</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#tab-2" data-toggle="tab"><i class="ti-settings"></i> Settings</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tab-1">

                <div class="ibox" id="mailbox-container">
                  <div class="mailbox-header d-flex justify-content-between" style="border-bottom: 1px solid #e8e8e8;">
                    <div>
                      <h5 class="inbox-title">Selamat Datang di Penilaian Karyawan</h5>
                      <div class="p-r-10 font-13"><?php echo date("d M Y - H:m"); ?></div>
                    </div>

                  </div>
                  <!-- <div class="mailbox-body">
                                <p>Hello admin. Can you help me?</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book. <strong>It has survived</strong> not only five centuries.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>
                                <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                            </div> -->


                </div>
              </div>
              <div class="tab-pane fade" id="tab-2">
                <form id="form1" action="./action/action_edit.php" method="post" novalidate="novalidate">
                  <input type="hidden" name="op" value="user_login">
                  <input type="hidden" name="bagian" value="<?php echo $_SESSION['id_bagian']; ?>">

                  <div class="row">
                    <div class="col-sm-6 form-group">
                      <label>User Name</label>
                      <input class="form-control" type="text" name="username" placeholder="User Name" value="<?php echo $data['username']; ?>">
                    </div>
                    <div class="col-sm-6 form-group">
                      <label>NIK</label>
                      <input class="form-control" type="text" placeholder="NIK" type="text" name="nik" value="<?php echo $data['nik']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control" type="text" placeholder="Nama Lengkap" value="<?php echo $data['nama_lengkap']; ?>" type="text" name="nama_lengkap">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" placeholder="Password" value="<?php echo $data['password']; ?>" name="password">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-info" id="buttonsimpan" type="submit">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <style>
      .profile-social a {
        font-size: 16px;
        margin: 0 10px;
        color: #999;
      }

      .profile-social a:hover {
        color: #485b6f;
      }

      .profile-stat-count {
        font-size: 22px
      }
    </style>
  </div>




<?php } else { ?>

  <div class="page-content fade-in-up">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="ibox bg-success color-white widget-stat">
          <div class="ibox-body">
            <h2 class="m-b-5 font-strong">
              <?php echo count($counts->getCountPegawai()) ?>
            </h2>
            <div class="m-b-5">Pegawai</div><i class="ti-user widget-stat-icon"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="ibox bg-info color-white widget-stat">
          <div class="ibox-body">
            <h2 class="m-b-5 font-strong">
              <?php echo count($counts->getCountBagian()) ?>
            </h2>
            <div class="m-b-5">Divisi/Bagian</div><i class="fa fa-building widget-stat-icon"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="ibox bg-warning color-white widget-stat">
          <div class="ibox-body">
            <h2 class="m-b-5 font-strong">
              <?php echo count($counts->getCountKriteria()) ?>
            </h2>
            <div class="m-b-5">Kriteria</div><i class="fa fa-bold widget-stat-icon"></i>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="page-content fade-in-up">
    <div class="row">
      <div class="col-lg-3 col-md-4">
        <div class="ibox">
          <div class="ibox-body text-center">
            <div class="m-t-20">
              <img class="img-circle" src="./assets/img/admin-avatar.png" />
            </div>
            <h5 class="font-strong m-b-10 m-t-10"><?php echo $_SESSION['nama_lengkap']; ?></h5>
            <div class="m-b-20 text-muted"><?php echo $dataBagian; ?></div>
          </div>
        </div>
        <div class="ibox">
          <div class="ibox-body">
            <div class="row text-center m-b-20">
              <div class="col-4">
                <div class="font-24 profile-stat-count">
                  <?php echo count($counts->getCountUser()) ?>
                </div>
                <div class="text-muted">User</div>
              </div>
              <div class="col-4">
                <div class="font-24 profile-stat-count">
                  <?php echo count($counts->getCountBobot()) ?>
                </div>
                <div class="text-muted">Bobot</div>
              </div>
              <div class="col-4">
                <div class="font-24 profile-stat-count">
                  <?php echo count($counts->getCountNilaiPegawai()) ?>
                </div>
                <div class="text-muted">Nilai</div>
              </div>
            </div>
            <p class="text-center">Semua total data yang terdaftar</p>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-8">
        <div class="ibox">
          <div class="ibox-body">
            <ul class="nav nav-tabs tabs-line">
              <li class="nav-item">
                <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i> Overview</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#tab-2" data-toggle="tab"><i class="ti-settings"></i> Settings</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tab-1">

                <div class="ibox" id="mailbox-container">
                  <div class="mailbox-header d-flex justify-content-between" style="border-bottom: 1px solid #e8e8e8;">
                    <div>
                      <h5 class="inbox-title">Selamat Datang di Penilaian Pegawai</h5>
                      <div class="p-r-10 font-13"><?php echo date("d M Y - H:m"); ?></div>
                    </div>

                  </div>
                  <!-- <div class="mailbox-body">
                                <p>Hello admin. Can you help me?</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book. <strong>It has survived</strong> not only five centuries.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>
                                <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                            </div> -->


                </div>
              </div>
              <div class="tab-pane fade" id="tab-2">
                <form id="form" action="./action/action_edit.php" method="post" novalidate="novalidate">
                  <input type="hidden" name="op" value="user_login">
                  <input type="hidden" name="bagian" value="<?php echo $_SESSION['id_bagian']; ?>">
                  <input type="hidden" name="id" value="<?php echo $_SESSION['id_admin']; ?>">

                  <div class="row">
                    <div class="col-sm-6 form-group">
                      <label>User Name</label>
                      <input class="form-control" type="text" name="username" placeholder="User Name" value="<?php echo $data['username']; ?>">
                    </div>
                    <div class="col-sm-6 form-group">
                      <label>NIK</label>
                      <input class="form-control" type="text" placeholder="NIK" type="text" name="nik" value="<?php echo $data['nik']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control" type="text" placeholder="Nama Lengkap" value="<?php echo $data['nama_lengkap']; ?>" type="text" name="nama_lengkap">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" placeholder="Password" value="<?php echo $data['password']; ?>" name="password">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-info" id="buttonsimpan" type="submit">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <style>
      .profile-social a {
        font-size: 16px;
        margin: 0 10px;
        color: #999;
      }

      .profile-social a:hover {
        color: #485b6f;
      }

      .profile-stat-count {
        font-size: 22px
      }
    </style>
  </div>

<?php
}
?>