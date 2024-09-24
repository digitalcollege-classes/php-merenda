<?php

declare(strict_types=1);

namespace App\Controller;

class OrderController extends AbstractController implements ControllerInterface
{
    public function add(): void
    {
        $this->render('order/add');
    }

    public function list(): void
    {
        $this->render('order/list');
    }

    public function edit(): void
    {
        $this->render('order/edit');
    }

    public function remove(): void
    {
        echo "excluir...";
    }
}
