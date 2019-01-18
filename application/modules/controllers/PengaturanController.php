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

class PengaturanController extends BaseController {

    protected function Index() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                $this->render_view("pengaturan", "pegawai", "", "pengaturan");
            } else if($_SESSION['hak_akses'] == "mahasiswa") {
                $this->render_view("pengaturan", "mahasiswa", "", "pengaturan");
            }
        } else {
            header('location: index');
        }
    }

}
