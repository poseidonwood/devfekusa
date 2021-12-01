            <div class="page-heading">
                <h1 class="page-title">Bagian/Divisi</h1>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Daftar Bagian/Divisi</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="bagian-table" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                     <tbody>
                        <?php
                        $query="SELECT * FROM bagian";
                        $execute=$konek->query($query);
                        if ($execute->num_rows > 0){
                            $no=1;
                            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                echo"
                                <tr id='data'>
                                    <td>$no</td>
                                    <td>$data[namaBagian]</td>
                                        <td>
                                            <a class='btn btn-default btn-xs m-r-5' data-toggle='tooltip' href='./?page=edit_bagian&aksi=ubah&id=".$data['id_bagian']."' data-original-title='Edit'><i class='fa fa-pencil font-14'></i></a>
                                            <button class='btn btn-danger btn-xs' data-toggle=".$data['namaBagian']." id='hapus' href='./action/action_hapus.php/?op=bagian&id=".$data['id_bagian']."' data-toggle='tooltip' data-original-title='Delete'><i class='fa fa-trash font-14'></i></button>
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
