<div class="page-content fade-in-up">

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Tambah Bobot</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">



            <form class="form-horizontal" id="form" action="./action/action_tambah.php" method="POST">
                <input type="hidden" value="bobot" name="op">
                <div class="panel-middle">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Bagian</label>
                        <div class="col-sm-10">
                            <select  required name="bagian" id="bagian" class="form-control-sm">
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
                    <?php
                    $listWeight = array(
					    array("nama" => "0.1", "nilai" => 0.1),
                        array("nama" => "0.2", "nilai" => 0.2),
                        array("nama" => "0.3", "nilai" => 0.3),
                        array("nama" => "0.4", "nilai" => 0.4),
                        array("nama" => "0.5", "nilai" => 0.5),
                    );
                    $query = "SELECT * FROM kriteria";
                    $execute = $konek->query($query);
                    if ($execute->num_rows > 0) {
                        while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                            echo "                    <div class=\"form-group row\">
                        <label class=\"col-sm-2 col-form-label\">$data[namaKriteria]</label>
                        <div class=\"col-sm-10\">
                        <input type='hidden' value=$data[id_kriteria] name='kriteria[]'>
                            <select  required name=\"bobot[]\" id=\"$data[namaKriteria]\" class=\"form-control-sm\" >
                            <option selected disabled>--Pilih Bobot $data[namaKriteria]--</option>";
                            foreach ($listWeight as $key) {
                                echo "<option value=\"$key[nilai]\">$key[nama]</option>";
                            }
                            echo "      </select>
                      </div>
                                            </div>

                ";
                        }
                    }
                    ?>
                </div>
                <div class="panel-bottom">
                                        <button type="reset" id="buttonreset" class="btn btn-danger">Reset</button>

                        <button class="btn btn-info" id="buttonsimpan"  type="submit">Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>
