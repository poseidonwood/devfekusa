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
$nikPegawai = @$_POST['nikPegawai'];
$pegawai = @$_POST['pegawai'];
$bagian = @$_POST['bagian'];

$kriteria = @$_POST['kriteria'];
$sifat = @$_POST['sifat'];
$nilai = @$_POST['nilai'];
$keterangan = @$_POST['keterangan'];
$bobot = @$_POST['bobot'];

switch ($op) {
    case 'bagian':
        if (!empty($namaBagian)) {
            $query = "UPDATE bagian SET namaBagian='$namaBagian' WHERE id_bagian='$id'";
            $crud->update($query, $konek, './?page=bagian');
        } else {
            $result = 'failed' . $konek->error;
            echo json_encode($result);
            $konek->close();
        }
        break;
    case 'user':
        $bagian = @$_POST['bagian'];
        $username = @$_POST['username'];
        $nik = @$_POST['nik'];
        $role = @$_POST['role'];
        $nama_lengkap = @$_POST['nama_lengkap'];
        $password = sha1(@$_POST['password']);
        if (!empty($bagian) && !empty($username) && !empty($nik) && !empty($nama_lengkap) && !empty($password) && !empty($role)) {
            $query = "UPDATE user SET username='$username' , nama_lengkap='$nama_lengkap' , nik='$nik' , password='$password' , id_bagian='$bagian' , role='$role'  WHERE id_admin='$id'";
            $crud->update($query, $konek, './?page=user');
        } else {
            $result = 'failed' . $konek->error;
            echo json_encode($result);
            $konek->close();
        }
        break;

    case 'user_login':
        $username = @$_POST['username'];
        $nik = @$_POST['nik'];
        $nama_lengkap = @$_POST['nama_lengkap'];
        $password = @$_POST['password'];
        if (!empty($username) && !empty($nama_lengkap) && !empty($nik) && !empty($password)) {
            $query = "UPDATE user SET username='$username' , nama_lengkap='$nama_lengkap' , nik='$nik' , password='$password'  WHERE id_admin='$id'";
            $crud->update($query, $konek, './index.php');
        } else {
            $result = 'failed' . $konek->error;
            echo json_encode($result);
            $konek->close();
        }
        break;

    case 'pegawai':
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

            $query = "UPDATE pegawai SET namaPegawai='$namaPegawai', nikPegawai='$nikPegawai' , id_bagian = '$bagian', alamat='$alamat' , tempat_lahir = '$tempat' , tanggal_lahir = '$tanggal' , gambar='$fileName' WHERE id_pegawai='$id'";
            $crud->updateWithImage($query, $konek, $file_tmp, $ukuran, $ekstensi, $targetFilePath, './?page=pegawai');
        } else {
            $result = '0';
            echo json_encode($result);
            $konek->close();
        }
        break;
    case 'kriteria':
        if (!empty($kriteria) && !empty($sifat)) {
            $cek = "SELECT namaKriteria FROM kriteria WHERE namaKriteria='$kriteria'";
            $query = "UPDATE kriteria SET namaKriteria='$kriteria',sifat='$sifat' WHERE id_kriteria='$id';";
            $crud->multiUpdate($cek, $query, $konek, './?page=kriteria');
        } else {
            $result = 'failed' . $konek->error;
            echo json_encode($result);
            $konek->close();
        }
        break;
    case 'subkriteria':
        if (!empty($kriteria) && !empty($nilai) && !empty($keterangan)) {
            $cek = "SELECT id_nilaikriteria FROM nilai_kriteria WHERE (id_kriteria='$kriteria' AND nilai ='$nilai') OR (id_kriteria='$kriteria' AND keterangan = '$keterangan')";
            $query = "UPDATE nilai_kriteria SET id_kriteria='$kriteria',nilai='$nilai',keterangan='$keterangan' WHERE id_nilaikriteria='$id'";
            $crud->multiUpdate($cek, $query, $konek, './?page=sub_kriteria');
        } else {
            $result = 'failed' . $konek->error;
            echo json_encode($result);
            $konek->close();
        }
        break;
    case 'bobot':
        $query = null;
        for ($i = 0; $i < count($id); $i++) {
            $query .= "UPDATE bobot_kriteria SET bobot='$bobot[$i]' WHERE id_bobotkriteria='$id[$i]';";
        }
        $crud->update($query, $konek, './?page=bobot');
        break;
    case 'nilai':
        $query = null;
        for ($i = 0; $i < count($id); $i++) {
            $query .= "UPDATE nilai_pegawai SET id_nilaikriteria='$nilai[$i]' WHERE id_nilaipegawai='$id[$i]';";
        }
        $crud->update($query, $konek, './?page=penilaian');
        break;
}
