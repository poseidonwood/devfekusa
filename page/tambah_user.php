<div class="page-content fade-in-up">

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Tambah User</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="form" action="./action/action_tambah.php" method="POST">
                <input type="hidden" name="op" value="user">
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

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Role User</label>
                        <div class="col-sm-10">
                            <select  required name="role" id="role" class="form-control-sm">
                                <option selected disabled>--Pilih Status User--</option>
                                <?php
                                $query = "SELECT * FROM role_user";
                                $execute = $konek->query($query);
                                if ($execute->num_rows > 0) {
                                    while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                                        echo "<option value=\"$data[id]\">$data[nama]</option>";
                                    }
                                } else {
                                    echo "<option value=\"\">Belum ada Status User</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="username">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nik">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nama_lengkap">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="password">
                        </div>
                    </div>

                </div>
                <div class="panel-bottom">
                    <button type="reset" id="buttonreset" class="btn btn-danger">Reset</button>

                    <button class="btn btn-info" id="buttonsimpan"  type="submit">Submit</button>
                </div>
            </form>


        </div>
    </div>
</div>
