<div class="page-heading">
    <h1 class="page-title">Kriteria</h1>
</div>
<div class="page-content fade-in-up">


    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Daftar Hasil</div>
            <div style="float:right;">
                <select class="form-control-sm"  name="pilih"  id="pilihHasil">
                    <option disabled selected value="">-- Pilih Tahun --</option>;
                    <?php
                                for ($i = date('Y') - 5; $i < date('Y') + 1; $i++) {
                                    echo "<option value=\"$i\">$i</option>";
                                }
                    ?>   
                </select>
            </div>
        </div>

    </div>
        <div id="valueHasil">
            <p class='text-center'><b>Pilih Bagian, untuk menampilkan hasil</b></p>
        </div>
</div>
