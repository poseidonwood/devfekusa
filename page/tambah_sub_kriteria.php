<div class="page-content fade-in-up">

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Tambah Sub Kriteria</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
          <form class="form-horizontal" id="form" action="./action/action_tambah.php" method="post" novalidate="novalidate">
                <input type="hidden" name="op" value="subkriteria">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="kriteria">Sifat Kriteria</label>
                    <div class="col-sm-10">
                        <select  required id="kriteria" name="kriteria" class="form-control-sm" >
                            <option selected disabled>-- Pilih Sifat Kriteria --</option>

                            <?php
                            $query = "SELECT * FROM kriteria";
                            $execute = $konek->query($query);
                            if ($execute->num_rows > 0) {
                                while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value=\"$data[id_kriteria]\">$data[namaKriteria]</option>";
                                }
                            } else {
                                echo "<option value=\"\">Belum ada kriteria</option>";
                            }
                            ?>
                        </select>
                    </div>

                </div>  
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nilai</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nilai">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="keterangan">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <button type="reset" id="buttonreset" class="btn btn-danger">Reset</button>

                        <button class="btn btn-info" id="buttonsimpan"  type="submit">Submit</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
