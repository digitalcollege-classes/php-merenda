<?php

declare(strict_types=1);

namespace App\Controller;

class CategoryController extends AbstractController implements ControllerInterface
{
    public function add(): void
    {
        $this->render('category/add');
    }

    public function list(): void
    {
        $this->render('category/list');
    }

    public function edit(): void
    {
        $this->render('category/edit');
    }

    public function remove(): void
    {
        echo "excluir...";
    }
}
