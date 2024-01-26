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

    public function render()
    {
        $this->renderTemplate('new_article');
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
                echo 'Article created successfully';
            } else {
                echo 'Error: Cannot create new article';
            }
        }
    }
}