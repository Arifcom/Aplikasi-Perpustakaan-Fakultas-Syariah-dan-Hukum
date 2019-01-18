<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseController
 *
 * @author WIN 10
 */

namespace system\core;

class BaseController {

    protected $url;
    protected $action;

    public function __construct($url, $action) {
        $this->url = $url;
        $this->action = $action;
    }

    public function execute_action() {
        return $this->{$this->action}();
    }

    protected function render_view($view, $template = null, $data = null, $active = null) {
        $content = __DIR__ . "/../../application/modules/views/" . $view . ".php";
        if ($template != null) {
            require __DIR__ . "/../../application/modules/views/templates/" . $template . ".php";
        } else {
            require $content;
        }
    }

}
