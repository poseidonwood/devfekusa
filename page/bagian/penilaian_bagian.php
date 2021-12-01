<div class="page-heading">
    <h1 class="page-title">Penilaian</h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <b style="float: left">Daftar Penilaian</b>

        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="sub-kriteria-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>Tahun</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>Tahun</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if (!empty($id)) {
                        $where = "WHERE nilai_pegawai.id_bagian='$id'";
                    } else {
                        $where = null;
                    }
                    $query = "SELECT
    nilai_pegawai.id_nilaipegawai,
        nilai_pegawai.tahun,

    nilai_pegawai.id_pegawai,
    pegawai.namaPegawai AS namaPegawai,
        pegawai.alamat AS alamat,

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
                    <td>$data[alamat]</td>
                    <td>$data[tahun]</td>
                </tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td  class='text-center text-green' colspan='4'><b>Kosong</b></td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
