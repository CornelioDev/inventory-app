<?php
declare(strict_types=1);

namespace App\Model;

class WarehouseItems extends BaseModel 
{
    public function create(int $articleId, int $warehouseId, int $quantity): bool
    {
        $query = 'INSERT INTO warehouses (article_id, warehouse_id, quantity) VALUES (:article_id, :warehouse_id, :quantity)';
        $bindings = [
            ':article_id' => $articleId,
            ':warehouse_id' => $warehouseId,
            ':quantity' => $quantity
        ];
        $statement = $this->executeQuery($query, $bindings);
        return $statement->rowCount() > 0;
    }

    public function getByArticleAndWarehouse(int $articleId, int $warehouseId)
    {
        $query = 'SELECT * FROM warehouse_items WHERE article_id = :article_id AND warehouse_id = :warehouse_id';
        $bindings = [
            ':article_id' => $articleId,
            ':warehouse_id' => $warehouseId,
        ];
        return $this->executeQuery($query, $bindings);
    }

    public function update(int $id, int $quantity): bool
    {
        $query = 'UPDATE warehouse_items SET quantity = :quantity WHERE id = :id';
        $bindings = [
            ':id' => $id,
            ':quantity' => $quantity,
        ];
        $statement = $this->executeQuery($query, $bindings);
        return $statement->rowCount() > 0;
    }

    public function delete(int $id): bool
    {
        $query = 'DELETE FROM warehouse_items WHERE id = :id';
        $bindings = [':id' => $id];
        $statement = $this->executeQuery($query, $bindings);
        return $statement->rowCount() > 0;
    }
}



