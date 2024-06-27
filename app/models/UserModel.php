<?php

namespace app\models;

use app\system\Database;
use PDO;

class UserModel
{
    public function create_user(Database $connection, $params = [])
    {
        $sql = "INSERT INTO usuarios VALUES('0', ?, ?, ?, ?, ?, ?, ?, NOW(), NOW(), NULL)";

        $database = $connection->create_connection();

        $stmt = $database->prepare($sql);
        $stmt->bindParam(1, $params["nome"]);
        $stmt->bindParam(2, $params["sobrenome"]);
        $stmt->bindParam(3, $params["nome_usuario"]);
        $stmt->bindParam(4, $params["data_nascimento"]);
        $stmt->bindParam(5, $params["genero"]);
        $stmt->bindParam(6, $params["email"]);
        $stmt->bindParam(7, $params["senha"]);
        $stmt->execute();
    }

    public function check_if_user_exists(Database $connection, $params)
    {
        $sql = "SELECT id, nome_usuario, senha FROM usuarios WHERE email = ?";

        $database = $connection->create_connection();
        $stmt = $database->prepare($sql);
        $stmt->bindParam(1, $params["email"]);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (password_verify($params["senha"], $data[0]["senha"])) {
            unset($data[0]["senha"]);
            return $data;
        }

    }
}
