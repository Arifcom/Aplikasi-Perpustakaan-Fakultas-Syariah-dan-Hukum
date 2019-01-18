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

class PencarianModel extends BaseModel{
    
    public $kode;
    public $penulis;
    public $judul;
    public $penerbit;

    public function __construct($kode, $penulis, $judul, $penerbit) {
        $this->kode = $kode;
        $this->penulis = $penulis;
        $this->judul = $judul;
        $this->penerbit = $penerbit;
    }    
    
    public static function cari() {
        $cari = $_POST['cari'];
        $query = self::db()->prepare("SELECT * FROM buku WHERE judul LIKE '%$cari%'");
        $query->execute();
        $result = array();
        while ($row = $query->fetch()) {
            array_push($result, new PencarianModel("", "", $row["judul"], ""));
        }
        return $result;
    }

}
