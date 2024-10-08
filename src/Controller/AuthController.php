<?php

declare(strict_types=1);

namespace App\Controller;

class AuthController extends AbstractController
{
    public function login(): void
    {
        parent::render('auth/login', true, false);
    }

}
