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
        if (true === isset($_SESSION['user_logged'])) { 
            header('location: /');
        }


        if (true === empty($_POST)) {
            ViewConfig::hideNavBar(true);
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

        if (false === password_verify($_POST['password'], $user->getPassword())) {
            die('Senha incorreta');
        }

        //se chegou ate aqui é pq merece logar
        $_SESSION['user_logged'] = [
            'id' => $user->getId(),
            'name' => $user->getName(),
        ];

        header('location: /');
    }

    public function logout(): void
    {
        session_destroy();
        header('location: /login');
    }
}
