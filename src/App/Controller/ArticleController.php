<?php
declare(strict_types=1);

namespace App\Controller;

class ArticleController extends BaseController
{
    public function newArticleForm()
    {
        $this->renderTemplate('new_article');
    }

    public function showAll()
    {   
        $query = 'SELECT * FROM articles';
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $articles = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $this->renderTemplate('show_all_articles', ['articles' => $articles]);
    }

    public function create()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // Capture form data
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price']; 

            $query = 'INSERT INTO articles (name, description, price) VALUES (:name, :description, :price)';
            
            $statement = $this->connection->prepare($query);
            
            $statement->bindParam(':name', $name);
            $statement->bindParam(':description', $description);
            $statement->bindParam(':price', $price);

            if ($statement->execute()) {
                header('Location: /articles');
            } else {
                echo '<script>alert("Error: Cannot create new article");</script>';
            }
        }
    }

    public function edit(string $id): void
    {
        $article = $this->getArticleById($id);
    }

    public function getArticleById(string $id)
    {

    }
}