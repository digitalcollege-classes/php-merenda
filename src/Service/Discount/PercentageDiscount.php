<?php

declare(strict_types=1);

namespace App\Service\Discount;

class PercentageDiscount extends Discount
{
    public const DISCOUNTS = [
        5,
        10,
    ];

    public function __construct(
        private float $percentage
    ) { }

    public function calculate(float $price): float
    {
        if (false === in_array($this->percentage, self::DISCOUNTS)) {
            die('Desconto invalido');
        }

        return $price - ($price * $this->percentage/100);
    }
}

