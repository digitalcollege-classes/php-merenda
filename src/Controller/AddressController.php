<?php

declare(strict_types=1);

namespace App\Controller;

class AddressController extends AbstractController implements ControllerInterface
{
    public function add(): void
    {
        $this->render('address/add');
    }

    public function list(): void
    {
        $this->render('address/list');
    }

    public function edit(): void
    {
        $this->render('address/edit');
    }

    public function remove(): void
    {
        echo "excluir...";
    }
}