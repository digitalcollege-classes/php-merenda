<?php

namespace App\Factory;

use App\Entity\User;

class UserConcreteFactory implements AbstractUserFactory
{
    public function createCustomerUser(): User
    {
        $user = new User();
        $user->setType('customer');
        return $user;
    }

    public function createAdminUser(): User
    {
        $user = new User();
        $user->setType('admin');
        return $user;
    }

    public function createVendorUser(): User
    {
        $user = new User();
        $user->setType('vendor');
        return $user;
    }
}
