<?php
$listWeight = array(
    array("nama" => "0.1", "nilai" => 0.1),
    array("nama" => "0.2", "nilai" => 0.2),
    array("nama" => "0.3", "nilai" => 0.3),
    array("nama" => "0.4", "nilai" => 0.4),
    array("nama" => "0.5", "nilai" => 0.5),
);
$id = htmlspecialchars(@$_GET['id']);
$querylihat = "SELECT id_bagian,bobot,id_bobotkriteria,kriteria.namaKriteria AS namaKriteria FROM bobot_kriteria INNER JOIN kriteria USING(id_kriteria) WHERE id_bagian='$id'";
$execute2 = $konek->query($querylihat);
if ($execute2->num_rows == 0) {
    header('location:./?page=bobot');
}
?>

<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Edit Bobot</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">



            <form class="form-horizontal" id="form" action="./action/action_edit.php" method="POST">
                <input type="hidden" value="bobot" name="op">
                <div class="panel-middle">

                    <div class="form-group row">
                        <?php
                        $query = "SELECT namaBagian FROM bagian WHERE id_bagian='$id'";
                        $execute = $konek->query($query);
                        $data = $execute->fetch_array(MYSQLI_ASSOC);
                        ?>

                        <label class="col-sm-2 col-form-label">Bagian</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?php echo $data['namaBagian']; ?>"  name="bagian" disabled>
                        </div>
                    </div>


                    
                    <?php
                    $execute2 = $konek->query($querylihat);
                    while ($data = $execute2->fetch_array(MYSQLI_ASSOC)) {

                        echo "<div class=\"form-group row\">
                        <label class=\"col-sm-2 col-form-label\">$data[namaKriteria]</label>
                        <div class=\"col-sm-10\">
                        <input type='hidden' value=$data[id_bobotkriteria] name='id[]'>
                            <select  required name=\"bobot[]\" id=\"$data[namaKriteria]\" class=\"form-control-sm\" >
                            <option selected disabled>--Pilih Bobot $data[namaKriteria]--</option>";
                        foreach ($listWeight as $key) {
                            if ($key['nilai'] == $data['bobot']) {
                                $selected = "selected";
                            } else {
                                $selected = null;
                            }
                            echo "<option $selected value=\"$key[nilai]\">$key[nama]</option>";
                        }
                        echo "</select>
                                </div>
                                    </div>";
                    }
                    ?>
                </div>
                <div class="panel-bottom">
                    <a class="btn btn-default" href='./?page=bobot'>Kembali</a>
                    <button class="btn btn-info" id="buttonsimpan"  type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
