<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseModel
 *
 * @author WIN 10
 */

namespace system\core;

class BaseModel {
    
    private $engine     = "mysql";
    private $host       = "localhost";
    private $name       = "database";
    private $user       = "root";
    private $password   = "";

    public static function db() {
        return new \PDO("".$this->engine.":host=".$this->host.";dbname=".$this->name, $this->user, $this->password);
    }
    
}
