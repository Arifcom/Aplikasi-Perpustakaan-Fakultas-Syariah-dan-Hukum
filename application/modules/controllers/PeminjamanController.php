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
use application\modules\models\PeminjamanModel;

class PeminjamanController extends BaseController {

    protected function Index() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "mahasiswa") {
                $this->render_view("peminjaman", "umum", "", "peminjaman");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Cari() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                $query = PeminjamanModel::cari();
                $this->render_view("monitor_peminjaman", "pegawai", $query, "peminjaman");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Monitor() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                $query = PeminjamanModel::monitor();
                $this->render_view("monitor_peminjaman", "pegawai", $query, "peminjaman");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Tambah() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "mahasiswa") {
                PeminjamanModel::tambah();
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Export() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                PeminjamanModel::export();
                header('location: ' . BASE_URL . 'peminjaman/monitor');
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }

}
