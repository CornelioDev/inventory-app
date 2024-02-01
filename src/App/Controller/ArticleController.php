<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Article;

class ArticleController extends BaseController
{
    private Article $articleModel;

    public function __construct()
    {
        $this->articleModel = new Article();
    }

    public function newArticleForm()
    {
        $this->renderTemplate('new_article');
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

            $price = floatval($price);

            if ($this->articleModel->create($name, $description, $price)) {
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
        $this->renderTemplate('edit_article_form', ['article' => $article]);
    }

    public function update(){
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            // Capture form data
            $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
            $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            $id = intval($id);
            $price = floatval($price);

            if ($this->articleModel->update($id, $name, $description, $price)) {
                header('Location: /articles');
                //var_dump($_POST);
            } else {
                echo '<script>alert("Error: Cannot edit this article data");</script>';
            }
        }
    }
}