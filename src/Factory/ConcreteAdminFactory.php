<?php

namespace App\Factory;

use App\Entity\User;
use App\Entity\Role;

class ConcreteAdminFactory implements AbstractUserFactory
{
  public function createUser(): User{

  }

  public function createRole(): Role{

  }
}
