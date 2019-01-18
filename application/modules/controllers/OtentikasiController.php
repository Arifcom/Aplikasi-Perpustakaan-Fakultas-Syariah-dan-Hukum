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

class OtentikasiController extends BaseController {

    protected function Masuk() {
        $query = AkunModel::masuk();
    }

    protected function MasukPeminjaman() {
        $query = AkunModel::masuk_peminjaman();
    }

    protected function MasukPengembalian() {
        $query = AkunModel::masuk_pengembalian();
    }

    protected function MasukPerpanjangan() {
        $query = AkunModel::masuk_perpanjangan();
    }

    protected function Keluar() {
        $query = AkunModel::keluar();
    }

}
