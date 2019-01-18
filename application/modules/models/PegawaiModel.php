<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AkunModel
 *
 * @author WIN 10
 */

namespace application\modules\models;

use system\core\BaseModel;

class PegawaiModel extends BaseModel{
    
    public $nip;
    public $nama;
    public $jabatan;

    public function __construct($nip, $nama, $jabatan) {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
    }

    public static function tampil() {
        $query = self::db()->prepare("SELECT * FROM pegawai");
        $query->execute();
        $result = array();
        while ($row = $query->fetch()) {
            array_push($result, new PegawaiModel($row["nip"], $row["nama"], $row["jabatan"]));
        }
        return $result;
    }
    
    public static function cari() {
        $cari = $_POST['cari'];
        $query = self::db()->prepare("SELECT * FROM pegawai WHERE nip LIKE '%$cari%' OR nama LIKE '%$cari%'");
        $query->execute();
        $result = array();
        while ($row = $query->fetch()) {
            array_push($result, new PegawaiModel($row["nip"], $row["nama"], $row["jabatan"]));
        }
        return $result;
    }
    
    public static function tambah() {
        $username = $_POST['nip'];
        $password = md5($username);
        $query = self::db()->prepare("INSERT INTO akun (username, password, hak_akses) VALUES ('$username', '$password', 'pegawai')");
        $query->execute();
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $query = self::db()->prepare("INSERT INTO pegawai (nip, nama, jabatan) VALUES ('$nip', '$nama', '$jabatan')");
        $query->execute();
    }

}
