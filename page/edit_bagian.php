<?php
$id=htmlspecialchars(@$_GET['id']);
$query="SELECT id_bagian,namaBagian FROM bagian WHERE id_bagian='$id'";
$execute=$konek->query($query);
if ($execute->num_rows > 0){
    $data=$execute->fetch_array(MYSQLI_ASSOC);
}else{
    header('location:./?page=bagian');
}
?>

<div class="page-content fade-in-up">
           
            <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit Bagian</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal" id="form" action="./action/action_edit.php" method="post" novalidate="novalidate">
                                <input type="hidden" name="op" value="bagian">
                                <input type="hidden" name="id" value="<?php echo $data['id_bagian']; ?>">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Bagian</label>
                                <div class="col-sm-10">
                                    <input class="form-control" value="<?php echo $data['namaBagian']; ?>" type="text" name="namaBagian">
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
