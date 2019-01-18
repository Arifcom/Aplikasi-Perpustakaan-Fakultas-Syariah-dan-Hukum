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

class BukuTamuModel extends BaseModel{
    
    public $nim;
    public $nama;
    public $keterangan;

    public function __construct($nim, $nama, $keterangan) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->keterangan = $keterangan;
    }

    public static function tampil() {
        $query = self::db()->prepare("SELECT * FROM buku_tamu");
        $query->execute();
        $result = array();
        while ($row = $query->fetch()) {
            array_push($result, new BukuTamuModel($row["nim"], $row["nama"], $row["keterangan"]));
        }
        return $result;
    }
    
    public static function cari() {
        $cari = $_POST['cari'];
        $query = self::db()->prepare("SELECT * FROM buku_tamu WHERE nim LIKE '%$cari%' OR nama LIKE '%$cari%'");
        $query->execute();
        $result = array();
        while ($row = $query->fetch()) {
            array_push($result, new BukuTamuModel($row["nim"], $row["nama"], $row["keterangan"]));
        }
        return $result;
    }
    
    public static function Tambah() {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $keterangan = $_POST['keterangan'];
        $query = self::db()->prepare("INSERT INTO buku_tamu (nim, nama, keterangan) VALUES ('$nim', '$nama', '$keterangan')");
        $query->execute();
    }

}
