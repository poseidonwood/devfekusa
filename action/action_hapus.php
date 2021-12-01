<?php
require '../connect.php';
require '../class/crud.php';
if ($_SERVER['REQUEST_METHOD']=='GET') {
    $id=@$_GET['id'];
    $op=@$_GET['op'];
}else if ($_SERVER['REQUEST_METHOD']=='POST'){
    $id=@$_POST['id'];
    $op=@$_POST['op'];
}
$crud=new crud();
switch ($op){
    case 'bagian':
        $query="DELETE FROM bagian WHERE id_bagian='$id'";
        $crud->delete($query,$konek);
        break;
        case 'user':
        $query="DELETE FROM user WHERE id_admin='$id'";
        $crud->delete($query,$konek);
        break;

    case 'pegawai':
        $query="DELETE FROM pegawai WHERE id_pegawai='$id'";
        $crud->delete($query,$konek);
        break;
    case 'kriteria':
        $query="DELETE FROM kriteria WHERE id_kriteria='$id'";
        $crud->delete($query,$konek);
        break;
    case 'sub_kriteria':
        $query="DELETE FROM nilai_kriteria WHERE id_nilaikriteria='$id'";
        $crud->delete($query,$konek);
        break;
    case 'bobot':
        $query="DELETE FROM bobot_kriteria WHERE id_bagian='$id'";
        $crud->delete($query,$konek);
        break;
    case 'nilai':
        $query="DELETE FROM nilai_pegawai WHERE id_pegawai='$id'";
        $crud->delete($query,$konek);
        break;
}