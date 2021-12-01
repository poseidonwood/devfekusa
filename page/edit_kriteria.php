<?php
$id=htmlspecialchars(@$_GET['id']);
$query="SELECT * FROM kriteria WHERE id_kriteria='$id'";
$sifat=array("Benefit","Cost");
$execute=$konek->query($query);
if ($execute->num_rows > 0){
    $data=$execute->fetch_array(MYSQLI_ASSOC);
}else{
    header('location:./?page=kriteria');
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
                                <input type="hidden" name="op" value="kriteria">
                                <input type="hidden" name="id" value="<?php echo $data['id_kriteria']; ?>">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Kriteria</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="<?php echo $data['namaKriteria']; ?>" type="text" name="kriteria">
                                </div>
                            </div>
<div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="sifat">Sifat Kriteria</label>
                                                                <div class="col-sm-10">

            <select  required id="sifat" name="sifat" class="form-control-sm" >
                <?php
                foreach ($sifat as $datasifat){
                    if ($datasifat == $data['sifat']){
                        $selected="selected";
                    }else{
                        $selected=null;
                    }
                    echo"<option $selected value=\"$datasifat\">$datasifat</option>";
                }
                ?>
            </select>
                                                                </div>
                                
        </div>                              <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button type="reset" id="buttonreset" class="btn btn-danger">Reset</button>

                                    <button class="btn btn-info" id="buttonsimpan"  type="submit">Submit</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
