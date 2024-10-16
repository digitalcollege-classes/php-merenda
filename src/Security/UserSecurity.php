<?php

declare(strict_types=1);

namespace App\Security;

class UserSecurity
{
    public static function encryptPassword(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}

