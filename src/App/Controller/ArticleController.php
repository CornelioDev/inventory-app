<?php
declare(strict_types=1);

namespace App\Controller;

use App\Database;

class ArticleController extends BaseController
{
    private Database $db;
    public function __construct()
    {
        //$this->db = new Database;
    }

    public function newArticleForm()
    {
        $this->renderTemplate('new_article');
    }

    public function showAll()
    {
        $this->db = new Database();
        $connection = $this->db->getConnection();
        $query = 'SELECT * FROM articles';
        $statement = $connection->prepare($query);
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

            $this->db = new Database();
            $connection = $this->db->getConnection();

            $query = 'INSERT INTO articles (name, description, price) VALUES (:name, :description, :price)';
            
            $statement = $connection->prepare($query);
            
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
}