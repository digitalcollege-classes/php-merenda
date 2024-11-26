<?php

declare(strict_types=1);

namespace App\Controller;


//funcao que redireciona pra uma url que sera recebida via parametro


abstract class AbstractController
{
    protected function render(string $view, array $data = []): void
    {
        //desestruturando o array $data
        // ['a' => 'Nome'] -> $a = 'Nome';
        extract($data);
        include '../views/_layouts/head.php';
        include '../views/_components/content.php';
        include "../views/{$view}.php";
        include '../views/_layouts/footer.php';
    }
}
