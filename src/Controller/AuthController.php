<?php

declare(strict_types=1);

namespace App\Controller;
use App\Config\ViewConfig;

class AuthController extends AbstractController
{
    public function login(): void
    {
        ViewConfig::hideMenu(true);
        parent::render('auth/login');
        ViewConfig::clearConfigs();
    }
}
