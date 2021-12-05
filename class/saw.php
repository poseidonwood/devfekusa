<?php

class saw
{

  private $konek;
  private $idCookie;
  private $idBagian;

  public $simpanNormalisasi = array();


  public function rand_color()
  {
    $chars = 'ABCDEF0123456789';
    $color = '#';
    for ($i = 0; $i < 6; $i++) {
      $color .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $color;
  }


  public function setconfig($konek, $idCookie, $idBagian)
  {
    $this->konek = $konek;
    $this->idCookie = $idCookie;
    $this->idBagian = $idBagian;
  }
  public function getConnect()
  {
    return $this->konek;
  }
  //mendapatkan kriteria
  public function getKriteria()
  {
    $data = array();
    $querykriteria = "SELECT namaKriteria FROM kriteria"; //query tabel kriteria
    $execute = $this->getConnect()->query($querykriteria);
    while ($row = $execute->fetch_array(MYSQLI_ASSOC)) {
      array_push($data, $row['namaKriteria']);
    }
    return $data;
  }
  //mendapatkan alternative
  public function getAlternative()
  {
    $data = array();
    $queryAlternative = "SELECT pegawai.namaPegawai AS namaPegawai,id_pegawai FROM nilai_pegawai INNER JOIN pegawai USING(id_pegawai) WHERE nilai_pegawai.id_bagian='$this->idBagian' AND nilai_pegawai.tahun='$this->idCookie' GROUP BY nilai_pegawai.id_pegawai ";
    $execute = $this->getConnect()->query($queryAlternative);
    if ($execute !== false) {
      while ($row = $execute->fetch_array(MYSQLI_ASSOC)) {
        array_push($data, array("namaPegawai" => $row['namaPegawai'], "id_pegawai" => $row['id_pegawai']));
      }
    }

    return $data;
  }
  public function getNilaiMatriks($id_pegawai)
  {
    $data = array();
    $queryGetNilai = "SELECT nilai_kriteria.nilai AS nilai,kriteria.sifat AS sifat,nilai_pegawai.id_kriteria AS id_kriteria FROM nilai_pegawai JOIN kriteria ON kriteria.id_kriteria=nilai_pegawai.id_kriteria JOIN nilai_kriteria ON nilai_kriteria.id_nilaikriteria=nilai_pegawai.id_nilaikriteria WHERE (id_bagian='$this->idBagian' AND tahun='$this->idCookie'  AND id_pegawai='$id_pegawai')";
    $execute = $this->getConnect()->query($queryGetNilai);
    while ($row = $execute->fetch_array(MYSQLI_ASSOC)) {
      array_push($data, array(
        "nilai" => $row['nilai'],
        "sifat" => $row['sifat'],
        "id_kriteria" => $row['id_kriteria']
      ));
    }
    return $data;
  }
  public function getArrayNilai($id_kriteria)
  {
    $data = array();
    $queryGetArrayNilai = "SELECT nilai_kriteria.nilai AS nilai FROM nilai_pegawai INNER JOIN nilai_kriteria ON nilai_pegawai.id_nilaikriteria=nilai_kriteria.id_nilaikriteria WHERE nilai_pegawai.id_kriteria='$id_kriteria' AND nilai_pegawai.id_bagian='$this->idBagian' AND nilai_pegawai.tahun='$this->idCookie' ";
    $execute = $this->getConnect()->query($queryGetArrayNilai);
    while ($row = $execute->fetch_array(MYSQLI_ASSOC)) {
      array_push($data, $row['nilai']);
    }
    return $data;
  }
  //rumus normalisasai
  public function normalisasi($array, $sifat, $nilai)
  {
    if ($sifat == 'Benefit') {
      $result = $nilai / max($array);
    } elseif ($sifat == 'Cost') {
      $result = min($array) / $nilai;
    }
    return round($result, 3);
  }
  //mendapatkan bobot kriteria
  public function getBobot($id_kriteria)
  {
    $queryBobot = "SELECT bobot FROM bobot_kriteria WHERE id_kriteria='$id_kriteria' ";
    $row = $this->getConnect()->query($queryBobot)->fetch_array(MYSQLI_ASSOC);
    return $row['bobot'];
  }
  //meyimpan hasil perhitungan
  public function simpanHasil($id_pegawai, $hasil)
  {
    $queryCek = "SELECT hasil FROM hasil WHERE id_pegawai='$id_pegawai' AND tahun='$this->idCookie' AND id_bagian='$this->idBagian' ";
    $execute = $this->getConnect()->query($queryCek);
    if ($execute->num_rows > 0) {
      $querySimpan = "UPDATE hasil SET hasil='$hasil' WHERE id_pegawai='$id_pegawai' AND  tahun='$this->idCookie' AND id_bagian='$this->idBagian'";
    } else {
      $querySimpan = "INSERT INTO hasil(hasil,id_pegawai,id_bagian,tahun) VALUES ('$hasil','$id_pegawai','$this->idBagian','$this->idCookie')";
    }
    $execute = $this->getConnect()->query($querySimpan);
  }
  //Kmencari kesimpulan
  public function getHasil()
  {
    $queryHasil     =   "SELECT hasil.hasil AS hasil,bagian.namaBagian,pegawai.namaPegawai AS namaPegawai FROM hasil JOIN bagian ON bagian.id_bagian=hasil.id_bagian JOIN pegawai ON pegawai.id_pegawai=hasil.id_pegawai WHERE hasil.hasil=(SELECT MAX(hasil) FROM hasil WHERE tahun='$this->idCookie' AND id_bagian='$this->idBagian')";
    $execute        =   $this->getConnect()->query($queryHasil);
    if ($execute !== false) {
      $execute_data = $execute->fetch_array(MYSQLI_ASSOC);
    } else {
      $execute_data = array();
    }
    // 
    echo "<p>Jadi rekomendasi pemilihan pegawai <i>$execute_data[namaBagian]</i> jatuh pada <i>$execute_data[namaPegawai]</i> dengan Nilai <b>" . round($execute_data['hasil'], 3) . "</b></p>";
  }
}
