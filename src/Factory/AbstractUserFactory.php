<?php

namespace App\Factory;

use App\Entity\User;
use App\Entiti\Role;

interface AbstractUserFactory
{
    public function createUser(): User;
    public function createRole(): Role;
}
