<?php

namespace app\controllers;

class BaseController
{
    public function view($filename, $data = [])
    {
        require_once __DIR__ . "../../views/$filename.php";
    }
}
