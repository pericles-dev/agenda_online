<?php

namespace app\controllers;

use app\system\Database;
use app\controllers\BaseController;
use app\models\UserModel;

class User extends BaseController
{
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

        $email = $_POST["email"];
        $password = $_POST["password"];

        //Validação pendente

        $params = [
            "email" => $email,
            "password" => $password
        ];

        $connection = new Database();

        $model = new UserModel;
        $data = $model->check_if_user_exists($connection, $params);

        $_SESSION["user_id"] = $data[0]["id"];
        $_SESSION["username"] = $data[0]["username"];

        unset($data);

        if (isset($_SESSION["user_id"])) {
            redirect("/", "Logado com sucesso");
            return;
        }
    }

    public function register_submit()
    {


        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $username = $_POST["username"];
        $birthdate  = $_POST["birthdate"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $confirm_email = $_POST["confirm_email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        if (!(strlen($first_name) >= 3)) {
            set_message("first_name", "O nome deve ter a partir de 3 caracteres.", "error", "/user/register");
            return;
        }

        if (!(strlen($last_name) >= 3)) {
            set_message("last_name", "O sobrenome deve ter a partir de 3 caracteres.", "error", "/user/register");
            return;
        }

        if (!(strlen($username) >= 3)) {
            set_message("username", "O nome de usuário deve ter a partir de 3 caracteres.", "error", "/user/register");
            return;
        }

        if ($email != $confirm_email) {
            set_message("email", "Os E-mails não são iguais.", "error");
            set_message("confirm_email", "Os E-mails não são iguais.", " error", "/user/register");
            return;
        }

        if ($password != $confirm_password) {
            set_message("password", "As Senhas não são iguais.", "error");
            set_message("confirm_password", "As senhas não são iguais.", " error", "/user/register");
            return;
        }

        $params = [
            "first_name" => $first_name,
            "last_name" => $last_name,
            "username" => $username,
            "birthdate" => $birthdate,
            "gender" => $gender,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ];

        $connection = new Database();

        $model = new UserModel;
        $model->create_user($connection, $params);

        set_message("successful_registration", "Usuário criado com sucesso.", "success", "/user/login");
    }

    public function logout()
    {
        $this->view("layouts/header_template");
        $this->view("logout");
        $this->view("layouts/footer_template");
    }

    public function logout_submit()
    {
        session_destroy();

        redirect("/", "");
    }

    public function profile_settings()
    {

        $params = ["user_id" => $_SESSION["user_id"]];

        $connection = new Database();

        $model = new UserModel;
        $data = $model->select_user_data($connection, $params);

        $this->view("layouts/header_template");
        $this->view("profile_settings", $data);
        $this->view("layouts/footer_template");
    }
}
