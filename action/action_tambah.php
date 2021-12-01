<?php

require '../connect.php';
require '../class/crud.php';
$crud = new crud($konek);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = @$_GET['id'];
    $op = @$_GET['op'];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = @$_POST['id'];
    $op = @$_POST['op'];
}
$namaBagian = @$_POST['namaBagian'];
$namaPegawai = @$_POST['namaPegawai'];
$bagian = @$_POST['bagian'];
$pegawai = @$_POST['pegawai'];
$nikPegawai = @$_POST['nikPegawai'];
$kriteria = @$_POST['kriteria'];
$sifat = @$_POST['sifat'];
$nilai = @$_POST['nilai'];
$keterangan = @$_POST['keterangan'];
$bobot = @$_POST['bobot'];
switch ($op) {
    case 'bagian'://tambah data bagian
        if (!empty($namaBagian)) {
            $query = "INSERT INTO bagian (namaBagian) VALUES ('$namaBagian')";
            $crud->addData($query, $konek);
        } else {
            $result = 'failed' . $konek->error;
            echo json_encode($result);
            $konek->close();
        }
        break;
    case 'user'://tambah data user
        $bagian = @$_POST['bagian'];
        $username = @$_POST['username'];
        $nik = @$_POST['nik'];
        $role = @$_POST['role'];
        $nama_lengkap = @$_POST['nama_lengkap'];
        $password = @$_POST['password'];

        if (!empty($bagian) && !empty($username) && !empty($nik) && !empty($nama_lengkap) && !empty($password) && !empty($role)) {

            $query = "INSERT INTO user (username,nama_lengkap,password,id_bagian,nik,role) VALUES ('$username','$nama_lengkap','$password','$bagian','$nik','$role')";
            $crud->addData($query, $konek);
        } else {
            $result = 'failed' . $konek->error;
            echo json_encode($result);
            $konek->close();
        }


        break;
    case 'pegawai': //tambah data pegawai
        $bagian = @$_POST['bagian'];
        $tempat = @$_POST['tempat'];
        $tanggal = @$_POST['tanggal'];
        $alamat = @$_POST['alamat'];
        $targetDir = "../uploads/";
        $fileName = @$_FILES["foto"]["name"];
        $targetFilePath = $targetDir . $fileName;
        $ukuran = @$_FILES['foto']['size'];
        $file_tmp = @$_FILES['foto']['tmp_name'];
        $x = explode('.', $fileName);
        $ekstensi = strtolower(end($x));
        if (!empty($bagian) && !empty($tempat) && !empty($tanggal) && !empty($alamat) && !empty($namaPegawai) && !empty($nikPegawai) && !empty($fileName)) {
            $query = "INSERT INTO pegawai (namaPegawai,nikPegawai,alamat,tanggal_lahir,tempat_lahir,id_bagian,gambar) VALUES ('$namaPegawai','$nikPegawai','$alamat','$tanggal','$tempat','$bagian','$fileName')";
            $crud->addDataWithImage($query, $konek, $file_tmp, $ukuran, $ekstensi, $targetFilePath);
        } else {
            $result = '0';
            echo json_encode($result);
            $konek->close();
        }
        break;
    case 'kriteria'://tambah data kriteria
        if (!empty($kriteria) && !empty($sifat)) {
            $cek = "SELECT namaKriteria FROM kriteria WHERE namaKriteria='$kriteria'";
            $query = null;
            $query = "INSERT INTO kriteria (namaKriteria,sifat) VALUES ('$kriteria','$sifat')";
            $crud->multiAddData($cek, $query, $konek);
        } else {
            $result = 'failed' . $konek->error;
            echo json_encode($result);
            $konek->close();
        }

        break;
    case 'subkriteria'://tambah data sub kriteria
        $nilaiSubKriteria = $_POST['nilai'];
        $keteranganSubKriteria = $_POST['keterangan'];

        if (!empty($kriteria) && !empty($nilaiSubKriteria) && !empty($keteranganSubKriteria)) {
            $cek = "SELECT id_nilaikriteria FROM nilai_kriteria WHERE (id_kriteria='$kriteria' AND nilai ='$nilai') OR (id_kriteria='$kriteria' AND keterangan = '$keterangan')";
            $query = null;
            $query .= "INSERT INTO nilai_kriteria (id_kriteria,nilai,keterangan) VALUES ('$kriteria','$nilai','$keterangan');";
            $crud->multiAddData($cek, $query, $konek);
        } else {
            $result = 'failed' . $konek->error;
            echo json_encode($result);
            $konek->close();
        }

        break;
    case 'bobot'://tambah data bobot
        if (!empty($bagian)) {
            $cek = "SELECT id_bobotkriteria FROM bobot_kriteria WHERE id_bagian='$bagian'";
            $query = null;
            for ($i = 0; $i < count($kriteria); $i++) {
                $query .= "INSERT INTO bobot_kriteria (id_bagian,id_kriteria,bobot) VALUES ('$bagian','$kriteria[$i]','$bobot[$i]');";
            }
            $crud->multiAddData($cek, $query, $konek);
        } else {
            $result = 'failed' . $konek->error;
            echo json_encode($result);
            $konek->close();
        }
        break;
    case 'nilai'://tambah data nilai
        $tahun = @$_POST['tahun'];
        if (!empty($pegawai) && !empty($tahun) && !empty($bagian) ) {
            $cek = "SELECT id_pegawai FROM nilai_pegawai WHERE id_pegawai='$pegawai' and tahun='$tahun' and id_bagian='$bagian'  ";
            $query = null;
            for ($i = 0; $i < count($nilai); $i++) {
                $query .= "INSERT INTO nilai_pegawai (id_pegawai,id_bagian,id_kriteria,id_nilaikriteria,tahun) VALUES ('$pegawai','$bagian','$kriteria[$i]','$nilai[$i]','$tahun');";
            }
            $crud->multiAddData($cek, $query, $konek);
        } else {
            $result = 'failed' . $konek->error;
            echo json_encode($result);
            $konek->close();
        }
        break;
}

    