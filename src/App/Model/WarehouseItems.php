<?php
declare(strict_types=1);

namespace App\Model;
use App\Database;

class WarehouseItems extends BaseModel 
{
    public function __construct()
    {
        parent::__construct(new Database);
    }

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
    
    public function getByArticle(int $articleId)
    {
        $query = 'SELECT * FROM warehouse_items WHERE article_id = :article_id';
        $bindings = [':article_id' => $articleId];
        $statement = $this->executeQuery($query, $bindings);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateQuantity(int $article_id, int $quantity): bool
    {
        $query = 'UPDATE warehouse_items SET quantity = :quantity WHERE article_id = :article_id';
        $bindings = [
            ':article_id' => $article_id,
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



