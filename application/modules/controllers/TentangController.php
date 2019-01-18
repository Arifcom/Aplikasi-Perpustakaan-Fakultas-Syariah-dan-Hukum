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

class TentangController extends BaseController {

    protected function Index() {
        $this->render_view("tentang", "umum", "", "tentang");
    }

}
