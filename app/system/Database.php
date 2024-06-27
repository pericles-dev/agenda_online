<?php

namespace app\system;

use PDO;
use PDOException;

class Database
{
    private $host;
    private $username;
    private $password;
    private $database;

    public function __construct($host=HOST, $username=USERNAME, $password=PASSWORD, $database=DATABASE)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function create_connection()
    {
        try {
            $connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo "<pre>";
            var_dump($error);
        }

        return $connection;
    }
}

/* 
        $db = new Database("localhost", "psantos", "peixes40", "agenda_online");
        $db->create_connection();
*/