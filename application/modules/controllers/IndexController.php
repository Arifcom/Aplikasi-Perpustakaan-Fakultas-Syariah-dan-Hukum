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

class IndexController extends BaseController {

    protected function Index() {
        session_start();
        $this->render_view("index", "umum");
    }


}
