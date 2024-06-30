<?php

namespace app\models;

use app\system\Database;
use PDO;

class TaskModel
{

    public function select_task_data(Database $connection, $id)
    {
        $sql = "SELECT id, task_name, task_description, task_date, task_hour FROM tasks WHERE id = ? LIMIT 1";

        $database = $connection->create_connection();
        $stmt = $database->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function select_all_tasks(Database $connection, $id)
    {
        $sql = "SELECT * FROM tasks WHERE user_id = ?";

        $database = $connection->create_connection();
        $stmt = $database->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function add_new_task(Database $connection, $params)
    {

        $sql = "INSERT INTO tasks VALUES ('0', ?, ?, ?, ?, ?, NOW(), NOW(), NULL)";

        $database = $connection->create_connection();
        $stmt = $database->prepare($sql);
        $stmt->bindParam(1, $params["user_id"]);
        $stmt->bindParam(2, $params["task_name"]);
        $stmt->bindParam(3, $params["task_description"]);
        $stmt->bindParam(4, $params["task_date"]);
        $stmt->bindParam(5, $params["task_hour"]);

        $stmt->execute();
    }

    public function update_task(Database $connection, $params)
    {
        $sql = "UPDATE tasks SET task_name = ?, task_description = ?, task_date = ?, task_hour = ?, updated_at = NOW() WHERE id = ?";

        $database = $connection->create_connection();
        $stmt = $database->prepare($sql);

        $stmt->bindParam(1, $params["task_name"]);
        $stmt->bindParam(2, $params["task_description"]);
        $stmt->bindParam(3, $params["task_date"]);
        $stmt->bindParam(4, $params["task_hour"]);
        $stmt->bindParam(5, $params["id"]);

        $stmt->execute();
    }

    public function delete_task(Database $connection, $params)
    {

        $sql = "DELETE FROM tasks WHERE id = ?";

        $database = $connection->create_connection();
        $stmt = $database->prepare($sql);

        $stmt->bindParam(1, $params["id"]);

        $stmt->execute();
    }
}
