<?php
declare(strict_types=1);

namespace App\Controller;

class HomeController
{
    public function render()
    {
        include_once __DIR__ . '/../View/layout/header.php';
        include_once __DIR__ . '/../View/home.php';
        include_once __DIR__ . '/../View/layout/footer.php';
    }
}
