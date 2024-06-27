<?php

session_start();

require_once "../vendor/autoload.php";

use app\system\Router;

Router::route();