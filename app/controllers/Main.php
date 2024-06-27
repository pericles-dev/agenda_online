<?php

namespace app\controllers;

use app\system\Database;
use app\controllers\BaseController;
use app\models\UserModel;

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

    public function login_submit()
    {
        //Função submit
    }

    public function register_submit()
    {

        $nome = $_POST["first_name"];
        $sobrenome = $_POST["last_name"];
        $username = $_POST["username"];
        $data_nascimento  = $_POST["birthdate"];
        $genero = $_POST["gender"];
        $email = $_POST["email"];
        $confirmar_email = $_POST["confirm_email"];
        $senha = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $confirmar_senha = $_POST["confirm_password"];

        $sql = "INSERT INTO usuarios VALUES('0', '$nome', '$sobrenome', '$username', '$data_nascimento', '$genero', '$email', '$senha', NOW(), NOW(), NULL)";

        $connection = new Database();
        $model = new UserModel;

        $model->create_user($connection, $sql);

        // echo "<pre>";

        // var_dump($params);
    }
}
