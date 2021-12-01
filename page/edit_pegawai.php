<?php
$id = htmlspecialchars(@$_GET['id']);
$query = "SELECT * FROM pegawai WHERE id_pegawai='$id'";
$execute = $konek->query($query);
if ($execute->num_rows > 0) {
    $data = $execute->fetch_array(MYSQLI_ASSOC);
} else {
    header('location:./?page=pegawai');
}
?>

<div class="page-content fade-in-up">

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Edit Pegawai</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>

        </div>
        <div class="ibox-body">
            <div >
                <div class="media">
                    <div class="media-img">
                        <img src="./uploads/<?php echo $data['gambar']; ?>"  style="object-fit:contain;
                             width:300px;
                             height:300px;
                             border: solid 1px #CCC" />
                    </div>
                </div>

            </div>
            <br/>
            <form class="form-horizontal" id="formEditUpload"  action="./action/action_edit.php" method="post" novalidate="novalidate" enctype="multipart/form-data">
                <input type="hidden" name="op" value="pegawai">
                <input type="hidden" name="id" value="<?php echo $data['id_pegawai']; ?>">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="sifat">Bagian</label>
                    <div class="col-sm-10">

                        <select  required  id="bagian" name="bagian" class="form-control-sm" >
                            <?php
                            $query = "SELECT * FROM bagian";
                            $execute = $konek->query($query);
                            if ($execute->num_rows > 0) {
                                while ($data2 = $execute->fetch_array(MYSQLI_ASSOC)) {
                                    if ($data2['id_bagian'] == $data['id_bagian']) {
                                        $selected = "selected";
                                    } else {
                                        $selected = null;
                                    }
                                    echo "<option $selected value=\"$data2[id_bagian]\">$data2[namaBagian]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>        



                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-10">
                        <input class="form-control" value="<?php echo $data['namaPegawai']; ?>" type="text" name="namaPegawai">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nik Pegawai</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nikPegawai" value="<?php echo $data['nikPegawai']; ?>" >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tempat" value="<?php echo $data['tempat_lahir']; ?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tanggal" value="<?php echo $data['tanggal_lahir']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="alamat" value="<?php echo $data['alamat']; ?>">
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

                        <button class="btn btn-info" id="buttonsimpan"  type="submit">Submit</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
