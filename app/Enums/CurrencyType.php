<?php

namespace App\Enums;

enum CurrencyType: int
{
    case USD = 1;
    case EUR = 2;
    case GBP = 3;
    case JPY = 4;

    public function getName(): string
    {
        return match ($this) {
            self::USD => 'USD',
            self::EUR => 'EUR',
            self::GBP => 'GBP',
            self::JPY => 'JPY',
        };
    }
}

