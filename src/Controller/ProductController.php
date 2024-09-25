<?php

declare(strict_types=1);

namespace App\Controller;

class ProductController extends AbstractController implements ControllerInterface
{
    public function add(): void
    {
        $this->render('product/add');
    }

    public function list(): void
    {
        $this->render('product/list');
    }

    public function edit(): void
    {
        $this->render('product/edit');
    }

    public function remove(): void
    {
        echo "excluir...";
    }
}
