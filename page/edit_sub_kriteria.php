<?php
$id = htmlspecialchars(@$_GET['id']);
$query = "SELECT * FROM nilai_kriteria WHERE id_nilaikriteria='$id'";
$execute = $konek->query($query);
if ($execute->num_rows > 0) {
    $data = $execute->fetch_array(MYSQLI_ASSOC);
} else {
    header('location:./?page=sub_kriteria');
}
?>

<div class="page-content fade-in-up">

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Edit Kriteria</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="form" action="./action/action_edit.php" method="post" novalidate="novalidate">
                <input type="hidden" name="op" value="subkriteria">
                <input type="hidden" name="id" value="<?php echo $data['id_nilaikriteria']; ?>">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="sifat">Kriteria</label>
                    <div class="col-sm-10">

                        <select  required  id="kriteria" name="kriteria" class="form-control-sm" >
                            <?php
                            $query = "SELECT * FROM kriteria";
                            $execute = $konek->query($query);
                            if ($execute->num_rows > 0) {
                                while ($data2 = $execute->fetch_array(MYSQLI_ASSOC)) {
                                    if ($data2['id_kriteria'] == $data['id_kriteria']) {
                                        $selected = "selected";
                                    } else {
                                        $selected = null;
                                    }
                                    echo "<option $selected value=\"$data2[id_kriteria]\">$data2[namaKriteria]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                </div>        
                
                                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nilai</label>
                    <div class="col-sm-10">
                        <input class="form-control" value="<?php echo $data['nilai']; ?>" type="text" name="nilai">
                    </div>
                </div>

                
                                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input class="form-control" value="<?php echo $data['keterangan']; ?>" type="text" name="keterangan">
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
