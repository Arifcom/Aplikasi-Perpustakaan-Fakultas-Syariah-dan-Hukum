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
use application\modules\models\AkunModel;
use application\modules\models\PerpanjanganModel;

class PerpanjanganController extends BaseController {

    protected function Index() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "mahasiswa") {
                $query = PerpanjanganModel::tampildimana();
                $this->render_view("perpanjangan", "umum", $query, "perpanjangan");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Cari() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                $query = PerpanjanganModel::cari();
                $this->render_view("monitor_perpanjangan", "pegawai", $query, "perpanjangan");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Monitor() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                $query = PerpanjanganModel::monitor();
                $this->render_view("monitor_perpanjangan", "pegawai", $query, "perpanjangan");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Tambah() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "mahasiswa") {
                PerpanjanganModel::tambah();
                AkunModel::keluar();
                header('location: ' . BASE_URL);
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Export() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                PerpanjanganModel::export();
                header('location: ' . BASE_URL . 'perpanjangan/monitor');
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }

}
