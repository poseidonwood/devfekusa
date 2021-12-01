            <div class="page-heading">
                <h1 class="page-title">Bobot Divisi/Bagian</h1>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Daftar Divisi/Bagian</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="bobot-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Divisi/Bagian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                     <tbody>
                        <?php
                        $query="SELECT bobot_kriteria.id_bagian AS idbagianbobot,bagian.namaBagian AS namaBagian FROM bobot_kriteria INNER JOIN bagian WHERE bobot_kriteria.id_bagian=bagian.id_bagian GROUP BY idbagianbobot ORDER BY idbagianbobot ASC";
                        $execute=$konek->query($query);
                        if ($execute->num_rows > 0){
                            $no=1;
                            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                echo"
                                <tr id='data'>
                                    <td>$no</td>
                                    <td>$data[namaBagian]</td>
                                        <td>
                                    <a class=\"btn btn-primary\" href='./?page=edit_bobot&aksi=ubah&id=" . $data['idbagianbobot'] . "'><i class='fa fa-pencil'></i></a>
                                    <a class=\"btn btn-danger\" data-toggle=" . $data['namaBagian'] . " id='hapus' href='./action/action_hapus.php/?op=bobot&id=" . $data['idbagianbobot'] . "'><i class='fa fa-trash'></i></a></td>
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
