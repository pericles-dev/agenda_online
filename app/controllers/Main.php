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
        $email = $_POST["email"];
        $senha = $_POST["password"];

        //Validação pendente

        $params = [
            "email" => $email,
            "senha" => $senha
        ];

        $connection = new Database();

        $model = new UserModel;
        $data = $model->check_if_user_exists($connection, $params);
        
        $_SESSION["user_id"] = $data[0]["id"];
        $_SESSION["username"] = $data[0]["nome_usuario"];

        unset($data);
        dd($_SESSION);

        if (isset($_SESSION["user_id"])) {
            redirect("/main", "Logado com sucesso");
            return;
        }


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
        $senha = $_POST["password"];
        $confirmar_senha = $_POST["confirm_password"];

        if (!(strlen($nome) >= 3)) {
            redirect("/main/register", "O nome deve ter a partir de 3 caracteres.");
            return;
        }

        if (!(strlen($sobrenome) >= 3)) {
            redirect("/main/register", "O sobrenome deve ter a partir de 3 caracteres.");
            return;
        }

        if (!(strlen($username) >= 3)) {
            redirect("/main/register", "O nome de usuário deve ter a partir de 3 caracteres.");
            return;
        }

        if ($email != $confirmar_email) {
            redirect("/main/register", "Os E-mails não são iguais.");
            return;
        }

        if ($senha != $confirmar_senha) {
            redirect("/main/register", "As Senhas não são iguais.");
            return;
        }

        $params = [
            "nome" => $nome,
            "sobrenome" => $sobrenome,
            "nome_usuario" => $username,
            "data_nascimento" => $data_nascimento,
            "genero" => $genero,
            "email" => $email,
            "senha" => password_hash($senha, PASSWORD_DEFAULT)
        ];


        $connection = new Database();

        $model = new UserModel;
        $model->create_user($connection, $params);

        redirect("/main/login", "Usuário criado com sucesso.");
    }
}
