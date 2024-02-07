<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Article;
use App\Model\Warehouse;
use App\Model\WarehouseItems;

class ArticleController extends BaseController
{
    private Article $articleModel;
    private Warehouse $warehouseModel;
    private WarehouseItems $warehouseItem;
    
    public function __construct()
    {
        $this->articleModel = new Article();
        $this->warehouseModel = new Warehouse();
        $this->warehouseItem = new WarehouseItems();
    }

    public function newArticleForm()
    {
        $this->renderTemplate('new_article', ['warehouses' => $this->warehouseModel->getAll()]);
    }

    public function show(string $id)
    {
        $id = intval($id);
        $article = $this->articleModel->getById($id);
        
        if ($article) {
            $this->renderTemplate('single_article', ['article' => $article]);
        } else {
            echo 'Article not found';
        }
    }

    public function showAll()
    {   
        $articles = $this->articleModel->getAll();
        $this->renderTemplate('show_all_articles', ['articles' => $articles]);
    }

    public function create()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // Capture form data
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
            $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $warehouse = filter_var($_POST['warehouse'], FILTER_SANITIZE_NUMBER_INT);
            $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);

            $price = floatval($price);
            $quantity = intval($quantity);
            $warehouse = intval($warehouse);

            if ($this->articleModel->create($name, $description, $price, $warehouse, $quantity)) {
                header('Location: /articles');
                //var_dump($_POST);
            } else {
                echo '<script>alert("Error: Cannot create new article");</script>';
            }
        }
    }

    public function edit(string $id)
    {
        $id = intval($id);
        $article = $this->articleModel->getById($id);
        $warehouse = $this->warehouseItem->getByArticle($id);
        $this->renderTemplate('edit_article_form', [
            'article' => $article,
            'current_warehouse' => $warehouse,
            'warehouses' => $this->warehouseModel->getAll()
        ]);
    }

    public function update(string $id){
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // Capture form data
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
            $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $warehouseItem = filter_var($_POST['warehouseItem'], FILTER_SANITIZE_NUMBER_INT);
            $warehouse = filter_var($_POST['warehouse'], FILTER_SANITIZE_NUMBER_INT);
            $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);

            $id = intval($id);
            $price = floatval($price);
            $warehouseItem = intval($warehouseItem);
            $warehouse = intval($warehouse);
            $quantity = intval($quantity);

            if ($this->articleModel->update($id, $name, $description, $price, $warehouseItem, $warehouse, $quantity)) {
                header("Location: /article/{$id}");
            } else {
                echo '<script>alert("Error: Cannot edit this article data");</script>';
                header("Refresh:0");
            }
        }
    }

    public function delete(string $id): void
    {
        $id = intval($id);

        if ($this->articleModel->delete($id)) {
            header('Location: /articles');
        } else {
            echo '<script>alert("Error: Cannot delete this article");</script>';
        }
    }
}