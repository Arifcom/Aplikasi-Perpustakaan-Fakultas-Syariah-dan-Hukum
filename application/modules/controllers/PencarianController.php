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
use application\modules\models\PencarianModel;

class PencarianController extends BaseController {

    protected function Cari() {
        $query = PencarianModel::cari();
        $this->render_view("pencarian", "umum", $query, "pencarian");
    }

}
