<div class="page-heading">
  <h1 class="page-title">Pegawai</h1>
</div>
<div class="page-content fade-in-up">
  <div class="ibox">
    <div class="ibox-head">
      <div class="ibox-title">Daftar Pegawai</div>
    </div>
    <div class="ibox-body">
      <table class="table table-striped table-bordered table-hover" id="pegawai-table" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          $query = "SELECT * FROM pegawai";
          $execute = $konek->query($query);
          $role = $_SESSION['role'];
        //   var_dump($role);
          if ($execute->num_rows > 0) {
            $no = 1;
            while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
              echo "
                                <tr id='data'>
                                    <td>$no</td>
                                    <td>$data[nikPegawai]</td>
                                    <td>$data[namaPegawai]</td>
                                        <td>
                             <a class='btn btn-default btn-xs m-r-5' data-toggle='tooltip' href='./?page=view_pegawai&aksi=ubah&id=" . $data['id_pegawai'] . "' data-original-title='View'><i class='fa fa-eye font-14'></i></a>";
              if ($role >= 0 && $role < 1) {
                echo "<a class='btn btn-default btn-xs m-r-5' data-toggle='tooltip' href='./?page=edit_pegawai&aksi=ubah&id=" . $data['id_pegawai'] . "' data-original-title='Edit'><i class='fa fa-pencil font-14'></i></a>";
                echo "<button class='btn btn-danger btn-xs' data-toggle=" . $data['namaPegawai'] . " id='hapus' href='./action/action_hapus.php/?op=pegawai&id=" . $data['id_pegawai'] . "' data-toggle='tooltip' data-original-title='Delete'><i class='fa fa-trash font-14'></i></button>
                                        </td>
                                    </tr>";
              }
              $no++;
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>