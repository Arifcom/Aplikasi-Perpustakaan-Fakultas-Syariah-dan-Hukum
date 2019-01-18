<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once __DIR__ . "/auto_loader.php";
require_once __DIR__ . "/configuration.php";

use system\Core;
use system\core\BaseController;

$kernel = new Core($_GET);
$controller = $kernel->get_controller();
$controller->execute_action();
