<?php
$konek=new mysqli('localhost','fekusaparamount','fekusaparamount','fekusaparamount');
if ($konek->connect_errno){
    "Database Error".$konek->connect_error;
}
?>