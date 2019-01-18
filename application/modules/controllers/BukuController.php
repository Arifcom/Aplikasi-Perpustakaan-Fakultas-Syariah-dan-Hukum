<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author WIN 10
 */

namespace application\modules\controllers;

use system\core\BaseController;
use application\modules\models\BukuModel;

class BukuController extends BaseController {

    protected function Index() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                $query = BukuModel::tampil();
                $this->render_view("buku", "pegawai", $query, "buku");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Cari() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                $query = BukuModel::cari();
                $this->render_view("buku", "pegawai", $query, "buku");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Import() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                BukuModel::import();
                header('location: ' . BASE_URL . 'buku');
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Export() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                BukuModel::export();
                header('location: ' . BASE_URL . 'mahasiswa');
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }

}
