<div class="page-heading">
    <h1 class="page-title">Sub Kriteria</h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <b style="float: left">Daftar Sub Kriteria</b>
            <div style="float:right;">
                <select class="form-control-sm"  name="pilih" id="pilih">
                    <option value="">Semua Kriteria</option>;
                    <?php
                    $query = "SELECT id_kriteria,namaKriteria FROM kriteria";
                    $execute = $konek->query($query);
                    if ($execute->num_rows > 0) {
                        while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                            if ($pilih == $data[id_kriteria]) {
                                $selected = "selected";
                            } else {
                                $selected = null;
                            }
                            echo "<option $selected value=$data[id_kriteria]>$data[namaKriteria]</option>";
                        }
                    } else {
                        echo '<option disabled value="">Tidak ada data</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="sub-kriteria-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Sifat</th>
                        <th>Sifat</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Sifat</th>
                        <th>Sifat</th>
                        <th>Action</th>

                    </tr>
                </tfoot>
                <tbody id="isiSubkriteria"></tbody>
            </table>
        </div>
    </div>
</div>
