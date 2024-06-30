<?php

namespace app\controllers;

use app\system\Database;
use app\controllers\BaseController;
use app\models\TaskModel;

class Task extends BaseController
{
    public function show_tasks()
    {

        $this->view("layouts/header_template");

        $id = $_SESSION["user_id"];

        $connection = new Database();

        $model = new TaskModel;
        $data = $model->select_all_tasks($connection, $id);

        $this->view("tasks_list", $data);
        $this->view("layouts/footer_template");
    }

    public function add_task()
    {
        $this->view("layouts/header_template");
        $this->view("add_task_form");
        $this->view("layouts/footer_template");
    }

    public function add_task_submit()
    {

        $user_id = $_POST["user_id"];
        $task_name = $_POST["task_name"];
        $task_description = $_POST["task_description"];
        $task_date = $_POST["task_date"];
        $task_hour = $_POST["task_hour"];


        if ($user_id != $_SESSION["user_id"]) {
            redirect("/task/edit_task", "O id do usuário é inválido");
            return;
        }

        if (strlen($task_name) < 6) {
            redirect("/task/edit_task/", "O nome da tarefa deve ter no mínimo 6 caracteres");
            return;
        }

        if (strlen($task_description) < 6) {
            redirect("/task/edit_task", "A descrição da tarefa deve ter no mínimo 6 caracteres");
            return;
        }

        if (empty($task_date)) {
            redirect("/task/edit_task", "Insira uma data válida");
        }

        $params = [
            "user_id" => $user_id,
            "task_name" => $task_name,
            "task_description" => $task_description,
            "task_date" => $task_date,
            "task_hour" => $task_hour
        ];

        $connection = new Database();

        $model = new TaskModel();
        $model->add_new_task($connection, $params);

        redirect("/", "");
    }

    public function edit_task($id)
    {
        $connection = new Database();

        $model = new TaskModel();
        $data = $model->select_task_data($connection, $id);

        $this->view("layouts/header_template",);
        $this->view("edit_task_form", $data);
        $this->view("layouts/footer_template");
    }

    public function edit_task_submit()
    {

        $id = $_POST["id"];
        $task_name = $_POST["task_name"];
        $task_description = $_POST["task_description"];
        $task_date = $_POST["task_date"];
        $task_hour = $_POST["task_hour"];

        if (strlen($task_name) < 6) {
            redirect("/task/edit_task/$id", "O nome da tarefa deve ter no mínimo 6 caracteres");
            return;
        }

        if (strlen($task_description) < 6) {
            redirect("/task/edit_task/$id", "A descrição da tarefa deve ter no mínimo 6 caracteres");
            return;
        }

        if (empty($task_date)) {
            redirect("/task/edit_task/$id", "Insira uma data válida");
        }


        $params = [
            "id" => $id,
            "task_name" => $task_name,
            "task_description" => $task_description,
            "task_date" => $task_date,
            "task_hour" => $task_hour
        ];

        $connection = new Database();

        $model = new TaskModel();
        $model->update_task($connection, $params);

        redirect("/", "");
    }

    public function delete_task($id)
    {
        $data = ["id" => $id];

        $this->view("layouts/header_template");
        $this->view("delete_task", $data);
        $this->view("layouts/footer_template");
    }

    public function delete_task_confirm($id){
        $params = ["id" => $id];

        $connection = new Database();
        $model = new TaskModel;
        $model->delete_task($connection, $params);

        redirect("/", "");
    }
}
