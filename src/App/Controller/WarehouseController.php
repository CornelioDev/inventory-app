<?php

namespace App\Controller;

use App\Model\Warehouse;

class WarehouseController extends BaseController
{
    private Warehouse $warehouseModel;

    public function __construct()
    {
        $this->warehouseModel = new Warehouse();
    }

    public function create(): void
    {
        $this->renderTemplate('create_warehouse_form');
    }

    public function store(): void
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // Capture form data
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $location = htmlspecialchars($_POST['location'], ENT_QUOTES, 'UTF-8');

            if ($this->warehouseModel->store($name, $location)) {
                header('Location: /warehouses');
            } else {
                echo '<script>alert("Error: Cannot create new article");</script>';
                header('Location: /warehouse/new');
            }
        }
    }

    public function showAll(): void
    {
        $warehouses = $this->warehouseModel->getAll();
        $this->renderTemplate('show_all_warehouses', ['warehouses' => $warehouses]);
    }

    public function show(string $id): void
    {
        $id = intval($id);
        $warehouse = $this->warehouseModel->getById($id);
        $articles = $this->warehouseModel->getArticlesByWarehouseId($id);

        if ($warehouse) {
            $this->renderTemplate('single_warehouse', ['warehouse' => $warehouse, 'articles' => $articles]);
        } else {
            echo 'Warehouse not found';
        }
    }

    public function delete(string $id): void
    {
        $id = intval($id);
        
        if ($this->warehouseModel->delete($id)) {
            header('Location: /warehouses');
        } else {
            echo '<script>alert("Error: Cannot delete this warehouse");</script>';
        }
    }

    public function edit(string $id)
    {
        $id = intval($id);
        $warehouse = $this->warehouseModel->getById($id);
        $this->renderTemplate('edit_warehouse_form', ['warehouse' => $warehouse]);
    }

    public function update(string $id){
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // Capture form data
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $location = htmlspecialchars($_POST['location'], ENT_QUOTES, 'UTF-8');

            $id = intval($id);

            if ($this->warehouseModel->update($id, $name, $location)) {
                header("Location: /warehouse/{$id}");
            } else {
                echo '<script>alert("Error: Cannot edit this warehouse data");</script>';
            }
        }
    }


}