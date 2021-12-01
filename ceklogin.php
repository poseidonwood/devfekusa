<?php

require 'connect.php';
$user = @$_POST['username'];
$pass = @$_POST['password'];

if (empty($user)) {
    $result = "Username tidak boleh kosong";
} elseif (empty($pass)) {
    $result = "Password Tidak boleh kosong";
} elseif (empty($username) && empty($pass)) {
    $ressult = "Username dan password tidak boleh kosong";
} else {
    $query = "SELECT*FROM user WHERE username='$user'";
    $execute = $konek->query($query);
    if ($execute->num_rows > 0) {
        $data = $execute->fetch_array(MYSQLI_ASSOC);
        if ($pass == $data['password']) {
            session_start();
            $_SESSION['user'] = $data['username'];
            $_SESSION['pass'] = $data['password'];
            $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['id_admin'] = $data['id_admin'];
            $_SESSION['id_bagian'] = $data['id_bagian'];

//            header('location:./index.php');
            $result = 'success';
        } else {
            $result = "Username dan Password tidak cocok";
        }
    } else {
        $result = "Username tidak terdaftar";
    }
}
echo json_encode($result);
