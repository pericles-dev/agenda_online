<?php

namespace app\models;

use app\system\Database;
use PDO;

class TaskModel
{

    public function select_all_tasks(Database $connection, $id)
    {
        $sql = "SELECT * FROM tarefas WHERE user_id = ?";

        $database = $connection->create_connection();
        $stmt = $database->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}
