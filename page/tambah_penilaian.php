<div class="page-content fade-in-up">

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Tambah Penilaian</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">



            <form class="form-horizontal" id="form" action="./action/action_tambah.php" method="POST">
                <input type="hidden" value="nilai" name="op">
                <div class="panel-middle">
                    <div class="form-group row">
                        <?php
                        echo "<input type='hidden' value=$_SESSION[id_bagian] name='bagian'>";
                        $query = "SELECT namaBagian FROM bagian WHERE id_bagian='$_SESSION[id_bagian]'";
                        $execute = $konek->query($query);
                        $data = $execute->fetch_array(MYSQLI_ASSOC);
                        ?>

                        <label class="col-sm-2 col-form-label">Bagian</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?php echo $data['namaBagian']; ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-10">
                            <select  required name="tahun" id="tahun" class="form-control-sm">
                                <option selected disabled>--Pilih Tahun--</option>
                                <?php
                                for ($i = date('Y') - 5; $i < date('Y') + 1; $i++) {
                                    echo "<option value=\"$i\">$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>






                    <?php
                        $where = "WHERE id_bagian='$_SESSION[id_bagian]'";
                    
                    $query = "SELECT id_pegawai, namaPegawai  from pegawai $where ";
                    $execute = $konek->query($query);

                    echo "<div class='form-group row'>
                        <label class='col-sm-2 col-form-label'>Pegawai</label>
                        <div class='col-sm-10'>
                            <select  required name='pegawai' id='pegawai' class='form-control-sm'>
                                <option selected disabled>--Pilih Pegawai--</option>";
                    if ($execute->num_rows > 0) {
                        while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                            echo "<option value=\"$data[id_pegawai]\">$data[namaPegawai]</option>";
                        }
                    } else {
                        echo '<option value=\'\'>Belum ada Pegawai</option>';
                    }
                    echo "</select>
                        </div>
                    </div>";

                    $query = "SELECT * FROM kriteria";
                    $execute = $konek->query($query);
                    if ($execute->num_rows > 0) {
                        while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                            echo "<div class=\"form-group row\">
                        <label class=\"col-sm-2 col-form-label\">$data[namaKriteria]</label>
                        <div class=\"col-sm-10\">
                        <input type='hidden' value=$data[id_kriteria] name='kriteria[]'>
                            <select  required name=\"nilai[]\" id=\"nilai[]\" class=\"form-control-sm\" >
                            <option selected disabled>--Pilih $data[namaKriteria]--</option>";
                            $query2 = "SELECT id_nilaikriteria,keterangan FROM nilai_kriteria WHERE id_kriteria='$data[id_kriteria]'";
                            $execute2 = $konek->query($query2);
                            if ($execute2->num_rows > 0) {
                                while ($data2 = $execute2->fetch_array(MYSQLI_ASSOC)) {
                                    echo "<option value=\"$data2[id_nilaikriteria]\">$data2[keterangan]</option>";
                                }
                            } else {
                                echo "<option disabled value=\"\">Belum ada Nilai Kriteria</option>";
                            };
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
