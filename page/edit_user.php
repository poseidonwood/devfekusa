<?php
$id = htmlspecialchars(@$_GET['id']);
$query = "SELECT id_admin,nik,username,nama_lengkap,password,nik FROM user WHERE id_admin='$id'";
$execute = $konek->query($query);
if ($execute->num_rows > 0) {
    $data = $execute->fetch_array(MYSQLI_ASSOC);
} else {
    header('location:./?page=user');
}
?>

<div class="page-content fade-in-up">

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Edit User</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="form" action="./action/action_edit.php" method="post" novalidate="novalidate">
                <input type="hidden" name="op" value="user">
                <input type="hidden" name="id" value="<?php echo $data['id_admin']; ?>">

                
                 
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
                    <label class="col-sm-2 col-form-label" for="sifat">Status User</label>
                    <div class="col-sm-10">

                        <select  required  id="role" name="role" class="form-control-sm" >
                            <?php
                            $query = "SELECT * FROM role_user";
                            $execute = $konek->query($query);
                            if ($execute->num_rows > 0) {
                                while ($data2 = $execute->fetch_array(MYSQLI_ASSOC)) {
                                    if ($data2['id'] == $data['role']) {
                                        $selected = "selected";
                                    } else {
                                        $selected = null;
                                    }
                                    echo "<option $selected value=\"$data2[id]\">$data2[nama]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div> 
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input class="form-control" value="<?php echo $data['username']; ?>" type="text" name="username">
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nik" value="<?php echo $data['nik']; ?>" >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input class="form-control" value="<?php echo $data['nama_lengkap']; ?>" type="text" name="nama_lengkap">
                    </div>
                </div>
                
                                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" value="<?php echo $data['password']; ?>" type="text" name="password">
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
