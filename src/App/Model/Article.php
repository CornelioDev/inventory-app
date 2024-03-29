<?php

declare(strict_types=1);

namespace App\Model;

use App\Database;

class Article extends BaseModel
{
    private ?int $id;
    private string $name;
    private string $description;
    private float $price;
    private string $createdAt;
    private int $warehouse;
    private int $quantity;



    public function __construct(string $name = '', string $description = '', float $price = 0.0, int $warehouse = 0, int $quantity = 1)
    {
        parent::__construct(new Database());
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->warehouse = $warehouse;
        $this->quantity = $quantity;
        $this->createdAt = date('Y-m-d H:i:s');
    }

    public function create(string $name, string $description, float $price, int $warehouse, int $quantity): bool
    {
        $query = 'INSERT INTO articles (name, description, price) 
        VALUES (:name, :description, :price)';

        $bindings = [
            ':name' => $name,
            ':description' => $description,
            ':price' => $price
        ];

        $statement = $this->executeQuery($query, $bindings);
        $statement->rowCount() > 0;

        if ($statement) {
            (empty($quantity)) ? $quantity = 1 : $quantity;
            $queryWarehouse = 'INSERT INTO warehouse_items (article_id, warehouse_id, quantity) VALUES (:article_id, :warehouse_id, :quantity)';
            $bindingsWarehouse = [
                ':article_id' => $this->connection->lastInsertId(),
                ':warehouse_id' => $warehouse,
                ':quantity' => $quantity,
            ];
            $this->executeQuery($queryWarehouse, $bindingsWarehouse);
            return true;
        }

        return false;
    }

    public function update(int $id, string $name, string $description, float $price, int $warehouseItem, $warehouse, int $quantity): bool
    {
        $query = 'UPDATE articles SET name = :name, description = :description, price = :price WHERE id = :id';

        $bindings = [
            ':id' => $id,
            ':name' => $name,
            ':description' => $description,
            ':price' => $price
        ];

        $statement = $this->executeQuery($query, $bindings);
        $statement->rowCount() > 0;

        if ($statement) {
            (empty($quantity)) ? $quantity = 1 : $quantity;

            $queryWarehouse = 'UPDATE warehouse_items SET warehouse_id = :warehouse_id, quantity = :quantity WHERE id = :warehouseItem_id';

            $bindingsWarehouse = [
                ':warehouseItem_id' => $warehouseItem,
                ':warehouse_id' => $warehouse,
                ':quantity' => $quantity,
            ];

            $statementWarehouse = $this->executeQuery($queryWarehouse, $bindingsWarehouse);
            $statementWarehouse->rowCount() > 0;
            return true;
        }

        return false;
    }

    public function delete(int $id): bool
    {
        $query = 'DELETE FROM articles WHERE id = :id';
        $bindings = [':id' => $id];
        $statement = $this->executeQuery($query, $bindings);
        return $statement->rowCount() > 0;
    }

    public function getById(int $id): array
    {
        $query = 'SELECT articles.*, warehouse_items.quantity, warehouses.name AS warehouse_name
              FROM articles
              LEFT JOIN warehouse_items ON articles.id = warehouse_items.article_id
              LEFT JOIN warehouses ON warehouse_items.warehouse_id = warehouses.id
              WHERE articles.id = :id';

        $bindings = [':id' => $id];
        $statement = $this->executeQuery($query, $bindings);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAll(): array
    {
        //$query = 'SELECT * FROM articles';
        $query = 'SELECT articles.*, warehouse_items.warehouse_id, warehouse_items.quantity, warehouses.name AS warehouse_name
              FROM articles
              LEFT JOIN warehouse_items ON articles.id = warehouse_items.article_id
              LEFT JOIN warehouses ON warehouse_items.warehouse_id = warehouses.id';
        $statement = $this->executeQuery($query);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
