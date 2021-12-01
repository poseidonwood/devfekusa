<?php

class counts {

    private $konek;
    public function setconfig($konek){
        $this->konek=$konek;
    }
    public function getConnect(){
       return $this->konek;
    }

    public function getCountPegawai(){
        $data=array();
        $query="SELECT * FROM pegawai";//query tabel kriteria
        $execute=$this->getConnect()->query($query);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row);
        }
        return $data;
    }

    
    public function getCountUser(){
        $data=array();
        $query="SELECT * FROM user where role=1 ";//query tabel kriteria
        $execute=$this->getConnect()->query($query);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row);
        }
        return $data;
    }

    
    public function getCountPegawaiBagian($idBagian){
        $data=array();
        $query="SELECT * FROM pegawai where id_bagian ='$idBagian' ";//query tabel kriteria
        $execute=$this->getConnect()->query($query);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row);
        }
        return $data;
    }


    public function getCountBagian(){
        $data=array();
        $query="SELECT * FROM bagian";//query tabel kriteria
        $execute=$this->getConnect()->query($query);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row);
        }
        return $data;
    }

        public function getCountBobot(){
        $data=array();
        $query="SELECT * FROM bobot_kriteria";//query tabel kriteria
        $execute=$this->getConnect()->query($query);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row);
        }
        return $data;
    }

    
    
        public function getCountNilaiPegawai(){
        $data=array();
        $query="SELECT * FROM nilai_pegawai";//query tabel kriteria
        $execute=$this->getConnect()->query($query);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row);
        }
        return $data;
    }

    
        public function getCountKriteria(){
        $data=array();
        $query="SELECT * FROM kriteria";//query tabel kriteria
        $execute=$this->getConnect()->query($query);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row);
        }
        return $data;
    }

    
}