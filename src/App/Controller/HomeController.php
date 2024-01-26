<?php

declare(strict_types=1);

namespace App\Controller;

class HomeController extends BaseController
{
    public function render()
    {
        $this->renderTemplate('home');
    }
}
