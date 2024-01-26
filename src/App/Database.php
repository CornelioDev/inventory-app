<?php

declare(strict_types=1);

namespace App;

use \PDO;

class Database
{
    private string $host;
    private string $db_name;
    private string $username;
    private string $password;
    private ?\PDO $connection = null;

    public function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->db_name = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASS'];
        //$this->connection = $this->getConnection();
    }

    public function getConnection(): \PDO
    {
        if ($this->connection === null) {
            try {
                $this->connection = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                echo 'Error de conexión: ' . $e->getMessage();
            }
        }

        return $this->connection;
    }
}
