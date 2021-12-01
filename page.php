<?php

$page = htmlspecialchars(@$_GET['page']);
switch ($page) {
    case null:
        include 'page/beranda.php';
        break;
    case 'beranda':
        include 'page/beranda.php';
        break;
    case 'user':
        include 'page/user.php';
        break;
    case 'edit_user':
        include 'page/edit_user.php';
        break;
    case 'tambah_user':
        include 'page/tambah_user.php';
        break;
    case 'pegawai':
        include 'page/pegawai.php';
        break;
    case 'view_pegawai':
        include 'page/view_pegawai.php';
        break;
    case 'pegawai_bagian':
        include 'page/bagian/pegawai_bagian.php';
        break;

    case 'tambah_pegawai':
        include 'page/tambah_pegawai.php';
        break;
    case 'edit_pegawai':
        include 'page/edit_pegawai.php';
        break;

    case 'bagian':
        include 'page/bagian.php';
        break;
    case 'tambah_bagian':
        include 'page/tambah_bagian.php';
        break;
    case 'edit_bagian':
        include 'page/edit_bagian.php';
        break;

    case 'kriteria':
        include 'page/kriteria.php';
        break;
    case 'tambah_kriteria':
        include 'page/tambah_kriteria.php';
        break;
    case 'edit_kriteria':
        include 'page/edit_kriteria.php';
        break;

    case 'sub_kriteria':
        include 'page/sub_kriteria.php';
        break;
    case 'tambah_sub_kriteria':
        include 'page/tambah_sub_kriteria.php';
        break;
    case 'edit_sub_kriteria':
        include 'page/edit_sub_kriteria.php';
        break;

    case 'bobot':
        include 'page/bobot.php';
        break;
    case 'tambah_bobot':
        include 'page/tambah_bobot.php';
        break;
    case 'edit_bobot':
        include 'page/edit_bobot.php';
        break;

    case 'penilaian':
        include 'page/penilaian.php';
        break;
    case 'penilaian_bagian':
        include 'page/bagian/penilaian_bagian.php';
        break;

    case 'tambah_penilaian':
        include 'page/tambah_penilaian.php';
        break;
    case 'edit_penilaian':
        include 'page/edit_penilaian.php';
        break;
    case 'hasil':
        include 'page/hasil.php';
        break;
    default:
        include 'page/404.php';
}