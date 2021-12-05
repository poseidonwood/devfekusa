<?php 
require '../connect.php';
require '../class/crud.php';
$defaultid = 5;
$defaultbobot = 0.1;
//cek sync bobot
//cek apa ada data baru di kriteria
$cekkriteria = "SELECT * from kriteria";
$execkriteria = $konek->query($cekkriteria);
$numkriteria = mysqli_num_rows($execkriteria);

//cek bobot 
$cekbobot = "SELECT * from bobot_kriteria";
$execbobot = $konek->query($cekbobot);
$numbobot = mysqli_num_rows($execbobot);

if($numkriteria !== $numbobot){
    // echo $numkriteria ."&". $numbobot;
    // exit;
    foreach ($execkriteria as $kriteriaexec){
        $id_kriteria = $kriteriaexec['id_kriteria'];
        $qcekkriteriainbobot = "SELECT * FROM bobot_kriteria where id_kriteria ='$id_kriteria'";
        $execqcekkriteriainbobot = $konek->query($qcekkriteriainbobot);
        if(mysqli_num_rows($execqcekkriteriainbobot) == 0){
            // echo $id_kriteria." data baru";
            $queryinsert = "INSERT INTO `bobot_kriteria` (`id_bobotkriteria`, `id_bagian`, `id_kriteria`, `bobot`) VALUES (NULL,'$defaultid','$id_kriteria','$defaultbobot')";
            $execinsert = $konek->query($queryinsert);
            // var_dump($queryinsert);
            echo "<script>window.history.back();
location.reload(); </script>";
        }
    }
}else{
    echo "<script>window.history.back();
location.reload(); </script>";
}
?>