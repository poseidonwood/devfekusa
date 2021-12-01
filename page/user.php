<div class="page-heading">
    <h1 class="page-title">User</h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Daftar User</div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="pegawai-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $query = "SELECT * FROM user INNER JOIN role_user as role
ON user.role = role.id WHERE NOT user.role = 0 ";
                    $execute = $konek->query($query);
                    if ($execute->num_rows > 0) {
                        $no = 1;
                        while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                            echo"
                                <tr id='data'>
                                    <td>$no</td>
                                                        
                                    <td>$data[username]</td>
                                                            <td>$data[nik]</td>

                                    <td>$data[nama_lengkap]</td>
                                        
                                    <td>$data[nama]</td>
                                                                         
                                        <td>
                                            <a class='btn btn-default btn-xs m-r-5' data-toggle='tooltip' href='./?page=edit_user&aksi=ubah&id=" . $data['id_admin'] . "' data-original-title='Edit'><i class='fa fa-pencil font-14'></i></a>
                                            <button class='btn btn-danger btn-xs' data-toggle=" . $data['nama_lengkap'] . " id='hapus' href='./action/action_hapus.php/?op=user&id=" . $data['id_admin'] . "' data-toggle='tooltip' data-original-title='Delete'><i class='fa fa-trash font-14'></i></button>
                                        </td>
                                    </tr>";
                            $no++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
