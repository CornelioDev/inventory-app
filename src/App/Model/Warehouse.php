<?php

declare(strict_types=1);
namespace App\Model;

use App\Database;

class Warehouse extends BaseModel
{
    private ?int $id;
    private string $name;
    private string $location;

    public function __construct(string $name = '', string $location = '')
    {
        parent::__construct(new Database);
        $this->name = $name;
        $this->location = $location;
    }

    public function store(string $name, string $location): bool
    {
        $query = 'INSERT INTO warehouses (name, location) 
        VALUES (:name, :location)';
        
        $bindings = [
            ':name' => $name, 
            ':location' => $location,
        ];
        
        $statement = $this->executeQuery($query, $bindings);
        return $statement->rowCount() > 0;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM warehouses';
        $statement = $this->executeQuery($query);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete(int $id): bool
    {
        $query = 'DELETE FROM warehouses WHERE id = :id';
        $bindings = [':id' => $id];
        $statement = $this->executeQuery($query, $bindings);
        return $statement->rowCount() > 0;
    }
}