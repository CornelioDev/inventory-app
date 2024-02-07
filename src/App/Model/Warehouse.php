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
        $query = 'SELECT w.*, COUNT(wi.article_id) AS article_count 
        FROM warehouses w LEFT JOIN warehouse_items wi 
        ON w.id = wi.warehouse_id 
        GROUP BY w.id';
        $statement = $this->executeQuery($query);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById(int $id): array
    {
        $query = 'SELECT * FROM warehouses WHERE id = :id';
        $bindings = [':id' => $id];
        $statement = $this->executeQuery($query, $bindings);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getArticlesByWarehouseId(int $warehouseId): array
    {
        $query = 'SELECT articles.*, warehouse_items.quantity 
              FROM articles 
              JOIN warehouse_items ON articles.id = warehouse_items.article_id
              WHERE warehouse_items.warehouse_id = :warehouse_id';

        $bindings = [':warehouse_id' => $warehouseId];

        $statement = $this->executeQuery($query, $bindings);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete(int $id): bool
    {
        $query = 'DELETE FROM warehouses WHERE id = :id';
        $bindings = [':id' => $id];
        $statement = $this->executeQuery($query, $bindings);
        return $statement->rowCount() > 0;
    }

    public function update(int $id, string $name, string $location): bool
    {
        $query = 'UPDATE warehouses SET name = :name, location = :location WHERE id = :id';
        $bindings = [
            ':id' => $id,
            ':name' => $name,
            ':location' => $location,
        ];
        $statement = $this->executeQuery($query, $bindings);
        return $statement->rowCount() > 0;
    }
}
