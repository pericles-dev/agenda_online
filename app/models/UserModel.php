<?php

namespace app\models;

use app\system\Database;
use PDO;

class UserModel
{
    public function create_user(Database $connection, $params = [])
    {
        $sql = "INSERT INTO users VALUES('0', ?, ?, ?, ?, ?, ?, ?, NOW(), NOW(), NULL)";

        $database = $connection->create_connection();

        $stmt = $database->prepare($sql);
        $stmt->bindParam(1, $params["first_name"]);
        $stmt->bindParam(2, $params["last_name"]);
        $stmt->bindParam(3, $params["username"]);
        $stmt->bindParam(4, $params["birthdate"]);
        $stmt->bindParam(5, $params["gender"]);
        $stmt->bindParam(6, $params["email"]);
        $stmt->bindParam(7, $params["password"]);
        $stmt->execute();
    }

    public function check_if_user_exists(Database $connection, $params)
    {
        $sql = "SELECT id, username, password FROM users WHERE email = ?";

        $database = $connection->create_connection();
        $stmt = $database->prepare($sql);
        $stmt->bindParam(1, $params["email"]);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (password_verify($params["password"], $data[0]["password"])) {
            unset($data[0]["password"]);
            return $data;
        }

    }


    public function select_user_data(Database $connection, $params)
    {
        $sql = "SELECT id, first_name, last_name, username, birthdate, gender, email, password FROM users WHERE id = ?";

        $database = $connection->create_connection();
        $stmt = $database->prepare($sql);
        $stmt->bindParam(1, $params["user_id"]);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;

    }

    // public function delete_user(Database $connection, $params)
    // {
    //     $sql = "DELETE FROM users WHERE id = ?";

    //     $database = $connection->create_connection();
    //     $stmt = $database->prepare($sql);
    //     $stmt->bindParam(1, $params["user_id"]);
    //     $stmt->execute();
    // }
}
