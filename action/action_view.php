<?php

require '../connect.php';
//require '../class/crud.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = @$_GET['id'];
    $op = @$_GET['op'];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = @$_POST['id'];
    $op = @$_POST['op'];
}
//$crud=new crud();
switch ($op) {
    case 'sub_kriteria':
        print "masuk";
        if (!empty($id)) {
            $where = "WHERE nilai_kriteria.id_kriteria='$id'";
        } else {
            $where = null;
        }
        $query = "SELECT id_nilaikriteria,nilai,keterangan,namaKriteria,id_kriteria FROM nilai_kriteria INNER JOIN kriteria USING (id_kriteria) $where ORDER BY id_kriteria,nilai ASC";
        $execute = $konek->query($query);
        if ($execute->num_rows > 0) {
            $no = 1;
            while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                echo"
            <tr id='data'>
                <td>$no</td>
                <td>" . $data['namaKriteria'] . "</td>
                <td>" . $data['nilai'] . "</td>
                <td>" . $data['keterangan'] . "</td>
                 <td><a class='btn btn-default btn-xs m-r-5' data-toggle='tooltip' href='./?page=edit_sub_kriteria&aksi=ubah&id=" . $data['id_nilaikriteria'] . "' data-original-title='Edit'><i class='fa fa-pencil font-14'></i></a>
                     <button class='btn btn-danger btn-xs' data-toggle=" . $data['namaKriteria'] . " id='hapus' href='./action/action_hapus.php/?op=sub_kriteria&id=" . $data['id_nilaikriteria'] . "' data-toggle='tooltip' data-original-title='Delete'><i class='fa fa-trash font-14'></i></button>
                 </td>   
                    </tr>";
                $no++;
            }
        } else {
            echo "<tr><td  class='text-center text-green' colspan='4'><b>Kosong</b></td></tr>";
        }
        break;
    case 'nilai':
        if (!empty($id)) {
            $where = "WHERE nilai_pegawai.id_bagian='$id'";
        } else if(!empty($_SESSION['id_bagian'])) {
            $where = "WHERE nilai_pegawai.id_bagian='$_SESSION[id_bagian]'";
        } else {
            $where = null;
        }
        $query = "SELECT
    nilai_pegawai.id_nilaipegawai,
        nilai_pegawai.tahun,

    nilai_pegawai.id_pegawai,
    pegawai.namaPegawai AS namaPegawai,
        pegawai.nikPegawai AS nikPegawai,

    bagian.id_bagian AS id_bagian,
    bagian.namaBagian AS namaBagian
FROM
    nilai_pegawai AS nilai_pegawai
INNER JOIN pegawai AS pegawai ON pegawai.id_pegawai = nilai_pegawai.id_pegawai
INNER JOIN bagian AS bagian ON bagian.id_bagian = nilai_pegawai.id_bagian $where
GROUP BY
    pegawai.id_pegawai , nilai_pegawai.tahun
ORDER BY
    pegawai.id_bagian,
    pegawai.id_pegawai ASC";
        $execute = $konek->query($query);
        if ($execute->num_rows > 0) {
            $no = 1;
            while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                echo"
                <tr id='data'>
                    <td>$no</td>
                    <td>$data[namaPegawai]</td>
                    <td>$data[nikPegawai]</td>
                    <td>$data[namaBagian]</td>
                    <td>$data[tahun]</td>
                    <td>
                    <div class='norebuttom'>
                    <a class=\"btn btn-primary\" href=\"./?page=edit_penilaian&aksi=ubah&a=$data[id_pegawai]&b=$data[id_bagian]&c=$data[tahun]\"><i class='fa fa-pencil'></i></a>
                    <a class=\"btn btn-danger\" data-toggle=\"$data[namaBagian] - $data[namaPegawai]\" id='hapus' href='./action/action_hapus.php/?op=nilai&id=" . $data['id_pegawai'] . "'><i class='fa fa-trash'></i></a></td>
                </div></tr>";
                $no++;
            }
        } else {
            echo "<tr><td  class='text-center text-green' colspan='4'><b>Kosong</b></td></tr>";
        }
        break;
    case 'pegawai':
        if (!empty($id)) {
            $where = "WHERE id_bagian='$id'";
        } else {
            $where = null;
        }
        $query = "SELECT id_pegawai, namaPegawai  from pegawai $where ";
        $execute = $konek->query($query);

        echo "<div class='form-group row'>
                        <label class='col-sm-2 col-form-label'>Pegawai</label>
                        <div class='col-sm-10'>
                            <select  required name='pegawai' id='pegawai' class='form-control-sm'>
                                <option selected disabled>--Pilih Pegawai--</option>";
        if ($execute->num_rows > 0) {
            while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                echo "<option value=\"$data[id_pegawai]\">$data[namaPegawai]</option>";
            }
        } else {
            echo '<option value=\'\'>Belum ada Pegawai</option>';
        }
        echo "</select>
                        </div>
                    </div>";

        break;
}