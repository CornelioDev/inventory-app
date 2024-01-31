<?php
declare(strict_types=1);

namespace App\Model;
use App\Database;

class BaseModel
{
    protected Database $db;
    protected $connection;
    
    public function __construct(Database $db)
    {
        $this->db = $db;
        $this->connection = $this->db->getConnection();
    }

    protected function executeQuery(string $query, array $bindings = [])
    {
        $statement = $this->connection->prepare($query);
        $this->bindValues($statement, $bindings);
        $statement->execute();
        return $statement;
    }

    protected function bindValues(\PDOStatement $statement, array $bindings)
    {
        foreach ($bindings as $param => $value) {
            $statement->bindValue($param, $value);
        }
    }
}