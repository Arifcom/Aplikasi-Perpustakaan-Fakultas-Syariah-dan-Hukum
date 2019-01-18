<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Core
 *
 * @author WIN 10
 */

namespace system;

class Core {

    private $url;
    private $controller;
    private $action;
    private $base_controller__namespace = "system\\core\\BaseController";
    private $controller_namespace = "\\application\\modules\\controllers\\";

    public function __construct($url) {
        $this->url = $url;

        if (empty($this->url["controller"])) {
            $this->controller = $this->controller_namespace . "IndexController";
        } else {
            $this->controller = $this->controller_namespace . $this->url["controller"] . "Controller";
        }

        if (empty($this->url["action"])) {
            $this->action = "index";
        } else {
            $this->action = $this->url["action"];
        }
    }

    public function get_controller() {
        if (class_exists($this->controller)) {
            $parent = class_parents($this->controller);

            if (in_array($this->base_controller__namespace, $parent)) {
                if (method_exists($this->controller, $this->action)) {
                    return new $this->controller($this->url, $this->action);
                } else {
                    throw new \Exception("Action not found!");
                }
            } else {
                throw new \Exception("Wrong class for controller. Not derived from BaseController.");
            }
        } else {
            throw new \Exception("Controller not found!");
        }
    }

}
