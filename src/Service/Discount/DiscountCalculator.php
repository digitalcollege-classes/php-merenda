<?php

declare(strict_types=1);

namespace App\Service\Discount;

abstract class DiscountCalculator
{
    public static function apply(Discount $discount, float $totalPrice): float
    {
        return $discount->calculate($totalPrice);
    }
}