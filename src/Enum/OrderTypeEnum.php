<?php

declare(strict_types=1);

namespace App\Enum;

enum OrderTypeEnum: int
{
    case RETIRADA = 1;

    case DELIVERY = 2;

    case CONSUMO_LOCAL = 3;

    public static function fromName(string $name): self
    {
        $name = strtoupper($name);

        return match ($name) {
            'RETIRADA' => self::RETIRADA,
            'DELIVERY' => self::DELIVERY,
            'CONSUMO_LOCAL' => self::CONSUMO_LOCAL,
        };
    } 
}
