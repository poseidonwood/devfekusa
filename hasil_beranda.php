<?php
require 'connect.php';
require 'class/saw.php';
require 'class/utils.php';

$cookiePilih = @$_COOKIE['pilih'];
$idBagian = @$_COOKIE['idBagian'];
$utils = new utils();

  if (isset($cookiePilih) and!empty($cookiePilih)) {
    $saw = new saw();
    $saw->setconfig($konek, $cookiePilih,$idBagian);
    ?>

                          

                            <?php
                              
                            count($saw->getKriteria());
                            foreach ($saw->getKriteria() as $key) {

                             }
                            ?>

                        <?php
                        //foreach data supplier
                        foreach ($saw->getAlternative() as $key) {
                            $no = 0;
                            //foreach nilai supplier
                            foreach ($saw->getNilaiMatriks($key['id_pegawai']) as $data) {
                                //menghitung normalisasi
                                $countBobot = count($saw->getKriteria());

                                $hasil = $saw->Normalisasi($saw->getArrayNilai($data['id_kriteria']), $data['sifat'], $data['nilai']);

                                $hitungbobot[$key['id_pegawai']][$no] = $hasil * $saw->getBobot($data['id_kriteria']);
                                $no++;
                            }
                        }
                        ?>

    <div class="ibox">
        <div style="flex:1;">
            <div class="ibox">
                <div class="ibox-body">
                    <div class="flexbox mb-4">
                        <div>
                            <h3 class="m-0">Statistics</h3>
                        </div>
                    </div>
                    <div>
                        <canvas id="bar_charts" style="height:300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>                

    <script type="text/javascript">

        $(function() {


        // Bar Chart example

        var barData = {
        labels: [<?php
            foreach ($saw->getKriteria() as $key) {
                echo '"' . $key . '",';
            }
            ?> ],
                datasets: [

    <?php
    foreach ($saw->getAlternative() as $key) {
        ?>{
                 label: "<?php echo  $key['namaPegawai'] ; ?>",
                 backgroundColor:'<?php echo $utils->rand_color(); ?>',
                borderColor: "#fff",

                 data: [<?php
                 
                 
                    $no = 0;
                            $hasil = 0;
                            foreach ($hitungbobot[$key['id_pegawai']] as $data) {
                                //menjumlahkan
                                    echo '"' . $data. '",';

                                }

                            ?> ]
            },
        <?php }
    ?>]


        };
        var barOptions = {
        responsive: true,
                maintainAspectRatio: false
        };
        var ctx = document.getElementById("bar_charts").getContext("2d");
        new Chart(ctx, {type: 'bar', data: barData, options:barOptions});
        });

    </script>

    <?php
//cetak hasil
}