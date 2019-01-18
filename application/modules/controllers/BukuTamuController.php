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
use application\modules\models\BukuTamuModel;

class BukuTamuController extends BaseController {
    
    protected function Index() {
        $query = BukuTamuModel::tampil();
        $this->render_view("bukutamu", "umum", $query, "bukutamu");
    }
    
    protected function Cari() {
        $query = BukuTamuModel::cari();
        $this->render_view("bukutamu", "umum", $query, "bukutamu");
    }
    
    protected function Tambah() {
        $query = BukuTamuModel::tambah();
        header('location: ' . BASE_URL . 'bukutamu');
    }
    
}
