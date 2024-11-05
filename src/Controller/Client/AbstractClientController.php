<?php

declare(strict_types=1);

namespace App\Controller\Client;

abstract class AbstractClientController
{
    protected function render(string $view, array $data = []): void
    {
        extract($data);

        include '../views/_layouts/head.php';

        include "../views/{$view}.php";

        include '../views/_layouts/footer.php';
    }
}
