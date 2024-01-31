<?php
declare(strict_types=1);

namespace App\Controller;
use App\Database;

class BaseController
{
    public function renderTemplate(string $templateFile, array $data = []): void
    {
        extract($data); 
        include_once __DIR__ . '/../View/layout/header.php';
        include_once __DIR__ . '/../View/'. $templateFile . '.php';
        include_once __DIR__ . '/../View/layout/footer.php';
    }
}
