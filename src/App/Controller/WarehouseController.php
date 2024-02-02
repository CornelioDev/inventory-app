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
                //header('Location: /warehouses');
                echo 'Warehouse created Successfully';
            } else {
                echo '<script>alert("Error: Cannot create new article");</script>';
            }
        }
    }
}