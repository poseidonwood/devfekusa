<div class="page-content fade-in-up">

  <div class="ibox">
    <div class="ibox-head">
      <div class="ibox-title">Tambah Pegawai</div>
      <div class="ibox-tools">
        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
      </div>
    </div>
    <div class="ibox-body">
      <form class="form-horizontal" id="formUpload" action="./action/action_tambah.php" method="post" novalidate="novalidate" enctype="multipart/form-data">
        <input type="hidden" name="op" value="pegawai">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Bagian</label>
          <div class="col-sm-10">
            <select required name="bagian" id="bagian" class="form-control-sm">
              <option selected disabled>--Pilih Bagian--</option>
              <?php
              $query = "SELECT * FROM bagian";
              $execute = $konek->query($query);
              if ($execute->num_rows > 0) {
                while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                  echo "<option value=\"$data[id_bagian]\">$data[namaBagian]</option>";
                }
              } else {
                echo "<option value=\"\">Belum ada Bagian</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nama Pegawai</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="namaPegawai">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nik Pegawai</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="nikPegawai">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tempat Lahir</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tempat">
          </div>
        </div>


        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
          <div class="col-sm-10">
            <input class="form-control" type="date" name="tanggal">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="alamat">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Foto</label>
          <div class="col-sm-10">
            <input class="form-control" type="file" name="foto">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-10 ml-sm-auto">
            <button type="reset" id="buttonreset" class="btn btn-danger">Reset</button>

            <button class="btn btn-info" id="buttonsimpan" type="submit">Submit</button>

          </div>
        </div>
      </form>
    </div>
  </div>
</div>