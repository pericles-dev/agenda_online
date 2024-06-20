<?php

namespace app\controllers;

use app\controllers\BaseController;

class Main extends BaseController
{

    public function home()
    {
        $this->view("layouts/header_template");
        echo "<h1>Home</h1>";
        $this->view("layouts/footer_template");
    }
    public function login()
    {
        $this->view("layouts/header_template");
        $this->view("login_form");
        $this->view("layouts/footer_template");
    }

    public function register()
    {
        $this->view("layouts/header_template");
        $this->view("register_form");
        $this->view("layouts/footer_template");
    }
}
