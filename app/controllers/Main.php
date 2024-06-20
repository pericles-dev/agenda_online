<?php
namespace app\controllers;

use app\controllers\BaseController;

class Main extends BaseController
{
    public function login()
    {
        $this->view("login_form");
    }
}