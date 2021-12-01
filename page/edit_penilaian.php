<?php
$a = htmlspecialchars(@$_GET['a']);
$b = htmlspecialchars(@$_GET['b']);
$c = htmlspecialchars(@$_GET['c']);
$getData = array();
$querylihat = "SELECT id_nilaikriteria FROM nilai_pegawai WHERE id_pegawai='$a' AND id_bagian='$b' AND tahun='$c' ";
$getnilaiKriteria = $konek->query($querylihat);
while ($data = $getnilaiKriteria->fetch_array(MYSQLI_ASSOC)) {
    array_push($getData, $data['id_nilaikriteria']);
}
?>

<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Edit Penilaian</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">



            <form class="form-horizontal" id="form" action="./action/action_edit.php" method="POST">
                <input type="hidden" value="nilai" name="op">
                <div class="panel-middle">

                    <div class="form-group row">
                        <?php
                        $query = "SELECT namaBagian FROM bagian WHERE id_bagian='$b'";
                        $execute = $konek->query($query);
                        $data = $execute->fetch_array(MYSQLI_ASSOC);
                        ?>

                        <label class="col-sm-2 col-form-label">Bagian</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?php echo $data['namaBagian']; ?>"  name="bagian" id="bagian" disabled>
                        </div>
                    </div>


                    <div class="form-group row">
                        <?php
                        $query = "SELECT namaPegawai FROM pegawai WHERE id_pegawai='$a'";
                        $execute = $konek->query($query);
                        $data = $execute->fetch_array(MYSQLI_ASSOC);
                        ?>

                        <label class="col-sm-2 col-form-label">Pegawai</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?php echo $data['namaPegawai']; ?>"  name="pegawai" id="pegawai" disabled>
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?php echo $c; ?>"  name="tahun" id="tahun" disabled>
                        </div>
                    </div>





                    <?php
                    $query = "SELECT namaKriteria,id_nilaipegawai,id_kriteria FROM nilai_pegawai INNER JOIN kriteria USING(id_kriteria) WHERE id_pegawai='$a' AND tahun='$c'";
                    $execute = $konek->query($query);
                    if ($execute->num_rows > 0) {
                        while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                            echo "<div class=\"form-group row\">";
                            echo "<label for=\"nilai\" class=\"col-sm-2 col-form-label\">$data[namaKriteria]</label>";
                            echo "<div class=\"col-sm-10\">";
                            echo "<input type='hidden' value=\"$data[id_nilaipegawai]\" name=\"id[]\">";
                            echo "<select required name=\"nilai[]\" id=\"nilai\"  class=\"form-control-sm\" >";
                            $query2 = "SELECT id_nilaikriteria,keterangan FROM nilai_kriteria WHERE id_kriteria='$data[id_kriteria]'";
                            $execute2 = $konek->query($query2);
                            if ($execute2->num_rows > 0) {
                                while ($data2 = $execute2->fetch_array(MYSQLI_ASSOC)) {
                                    if (array_search($data2['id_nilaikriteria'], $getData)) {
                                        $selected = "selected";
                                    } else {
                                        $selected = null;
                                    }
                                    echo "<option $selected value=\"$data2[id_nilaikriteria]\">$data2[keterangan]</option>";
                                }
                            } else {
                                echo "<option disabled value=\"\">Belum ada Nilai Kriteria</option>";
                            };
                            echo "</select></div></div>";
                        }
                    }
                    ?>


                </div>
                <div class="panel-bottom">
                    <a class="btn btn-default" href='./?page=penilaian'>Kembali</a>
                    <button class="btn btn-info" id="buttonsimpan"  type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
