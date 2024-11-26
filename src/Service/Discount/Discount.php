<?php

declare(strict_types=1);

namespace App\Service\Discount;

abstract class Discount
{
    abstract public function calculate(float $price): float;
}