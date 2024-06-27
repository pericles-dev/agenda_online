<?php

namespace app\models;

use app\system\Database;

class UserModel
{
    public function create_user(Database $connection, $sql,  $params = [])
    {
        // $sql = "INSERT INTO usuarios VALUES(0, ':nome', ':sobrenome', ':nome_usuario', ':data_nascimento',':genero', ':email', ':senha', NOW(), NOW(), NULL";

        $database = $connection->create_connection();

        $stmt = $database->prepare($sql);
        $stmt->execute();

        // var_dump($params);

    }
}
