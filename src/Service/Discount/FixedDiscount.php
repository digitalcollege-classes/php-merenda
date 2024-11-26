<?php

declare(strict_types=1);

namespace App\Service\Discount;

class FixedDiscount extends Discount
{
    public const DISCOUNTS = [
        10,
        15,
        20,
    ];

    public function __construct(
        private float $discountValue
    ) { }

    public function calculate(float $price): float
    {
        if (false === in_array($this->discountValue, self::DISCOUNTS)) {
            die('Desconto invalido');
        }

        return $price - $this->discountValue;
    }
}
