<?php

namespace App\Factory;

use App\Entity\User;

interface AbstractUserFactory
{
    public function createCustomerUser(): User;
    public function createAdminUser(): User;
    public function createVendorUser(): User;
}
