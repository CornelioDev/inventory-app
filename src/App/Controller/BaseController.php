<?php
declare(strict_types=1);

namespace App\Controller;
use App\Database;

class BaseController
{
    protected Database $db;
    protected $connection;
    
    public function __construct()
    {
        $this->db = new Database();
        $this->connection = $this->db->getConnection();
    }
    
    public function renderTemplate(string $templateFile, array $data = []): void
    {
        extract($data); 
        include_once __DIR__ . '/../View/layout/header.php';
        include_once __DIR__ . '/../View/'. $templateFile . '.php';
        include_once __DIR__ . '/../View/layout/footer.php';
    }
}
