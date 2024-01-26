<?php
declare(strict_types=1);

namespace App\Controller;

class ArticleController
{
    public function render()
    {
        include_once __DIR__ . '/../View/layout/header.php';
        include_once __DIR__ . '/../View/article_form.php';
        include_once __DIR__ . '/../View/layout/footer.php';
    }

    public function create()
    {
        // Process form logic
    }
}
