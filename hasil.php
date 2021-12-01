<?php
require 'connect.php';
require 'class/saw.php';
require 'class/utils.php';

$cookiePilih = @$_COOKIE['pilih'];
$idBagian = @$_COOKIE['idBagian'];
$utils = new utils();

if (isset($cookiePilih) and!empty($cookiePilih)) {
    $saw = new saw();
    $saw->setconfig($konek, $cookiePilih, $idBagian);
    ?>



    <div id="Matriks Keputusan">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Matriks Keputusan</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered" id="kriteria-table" cellspacing="0" width="100%" style="margin: 0px;">
                    <thead>
                        <tr>
                            <th rowspan="2">Alternative</th>
                            <th colspan="<?php echo count($saw->getKriteria()) ?>" style="text-align:center" >Kriteria</th>
                        </tr>
                        <tr>
                            <?php
                            foreach ($saw->getKriteria() as $key) {
                                echo "<th>$key</th>";
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($saw->getAlternative() as $key) {
                            echo "<tr id='data'>";
                            echo "<td>" . $key['namaPegawai'] . "</td>";
                            $no = 0;
                            foreach ($saw->getNilaiMatriks($key['id_pegawai']) as $data) {
                                $datas = $data['nilai'];
                                echo "<td>$datas</td>";
                            }
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="Normalisasi Matriks Keputusan">

        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Normalisasi Matriks Keputusan R</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-responsive" id="kriteria-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th rowspan="2">Alternative</th>
                            <th colspan="<?php echo count($saw->getKriteria()) ?>">Kriteria</th>
                        </tr>
                        <tr>
                            <?php
                            foreach ($saw->getKriteria() as $key) {
                                echo "<th>$key</th>";
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //foreach data supplier
                        foreach ($saw->getAlternative() as $key) {
                            echo "<tr id='data'>";
                            echo "<td>" . $key['namaPegawai'] . "</td>";
                            $no = 0;
                            //foreach nilai supplier
                            foreach ($saw->getNilaiMatriks($key['id_pegawai']) as $data) {
                                //menghitung normalisasi
                                $hasil = $saw->Normalisasi($saw->getArrayNilai($data['id_kriteria']), $data['sifat'], $data['nilai']);
                                echo "<td>$hasil</td>";
                                $hitungbobot[$key['id_pegawai']][$no] = $hasil * $saw->getBobot($data['id_kriteria']);
                                $no++;
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>      
                </table>
            </div>
        </div>
    </div>


    <div id="Perangkingan">

        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Perangkingan</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="kriteria-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th rowspan="2">Alternative</th>
                            <th colspan="<?php echo count($saw->getKriteria()) ?>">Kriteria</th>
                            <th rowspan="2">Hasil</th>
                        </tr>
                        <tr>
                            <?php
                            foreach ($saw->getKriteria() as $key) {
                                echo "<th>$key</th>";
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($saw->getAlternative() as $key) {
                            echo "<tr id='data'>";
                            echo "<td>" . $key['namaPegawai'] . "</td>";
                            $no = 0;
                            $hasil = 0;
                            foreach ($hitungbobot[$key['id_pegawai']] as $data) {
                                echo "<td>$data</td>";
                                //menjumlahkan
                                $hasil += $data;
                            }
                            $saw->simpanHasil($key['id_pegawai'], $hasil);
                            echo "<td>" . $hasil . "</td>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">

                <?php
                $saw->getHasil();
                ?>   

            </div>

        </div>
    </div>


<?php } ?>