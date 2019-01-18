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
use application\modules\models\PegawaiModel;

class PegawaiController extends BaseController {

    protected function Index() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                $query = PegawaiModel::tampil();
                $this->render_view("pegawai", "pegawai", $query, "pegawai");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Cari() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                $query = PegawaiModel::cari();
                $this->render_view("pegawai", "pegawai", $query, "pegawai");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Tambah() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                PegawaiModel::tambah();
                header('location: ' . BASE_URL . 'pegawai');
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }

}
