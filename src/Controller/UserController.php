<?php

declare(strict_types=1);

namespace App\Controller;

class UserController extends AbstractController implements ControllerInterface
{
    public function add(): void
    {
        $this->render('user/add');
    }

    public function list(): void
    {
        $this->render('user/list');
    }

    public function edit(): void
    {
        $this->render('user/edit');
    }

    public function remove(): void
    {
        echo "excluir...";
    }
}
