<?php
declare(strict_types=1);

namespace App\Controller;

class BaseController
{
    public function renderTemplate($templateFile)
    {
        include_once __DIR__ . '/../View/layout/header.php';
        include_once __DIR__ . '/../View/'. $templateFile . '.php';
        include_once __DIR__ . '/../View/layout/footer.php';
    }
}
