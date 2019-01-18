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
use application\modules\models\MahasiswaModel;

class MahasiswaController extends BaseController {

    protected function Index() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                $query = MahasiswaModel::tampil();
                $this->render_view("mahasiswa", "pegawai", $query, "mahasiswa");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Cari() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                $query = MahasiswaModel::cari();
                $this->render_view("mahasiswa", "pegawai", $query, "mahasiswa");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Import() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                MahasiswaModel::import();
                header('location: ' . BASE_URL . 'mahasiswa');
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Export() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                MahasiswaModel::export();
                header('location: ' . BASE_URL . 'mahasiswa');
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }

}
