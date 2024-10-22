<?php

declare(strict_types=1);

namespace App\Controller;

use App\Config\ViewConfig;
use App\Connection\Connection;
use App\Entity\User;

class AuthController extends AbstractController
{
    public function login(): void
    {
        if (true === empty($_POST)) {
            ViewConfig::hideMenu(true);
            parent::render('auth/login');
            ViewConfig::clearConfigs();

            return;
        }

        $repository = Connection::getEntityManager()->getRepository(
            User::class
        );

        $user = $repository->findOneBy([
            'email' => $_POST['email'],
        ]);

        if (null === $user) {
            die('Usuario nao encontrado');
        }

        //se chegar ate aqui, é pq tem alguem com esse email
        echo $user->getPassword();

    }
}
