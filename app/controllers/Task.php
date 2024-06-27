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

        $this->view("to_do_list", $data);

        $this->view("layouts/footer_template");
    }
}
