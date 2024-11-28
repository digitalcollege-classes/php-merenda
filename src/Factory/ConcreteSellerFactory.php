<?php

namespace App\Factory;

use App\Entity\User;
use App\Entity\Role;

class ConcreteSellerFactory implements AbstractUserFactory
{
  public function createUser(): User{

  }

  public function createRole(): Role{

  }
}
