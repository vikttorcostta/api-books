<?php

namespace App\Enums;

enum Rate: int
{
    case ONE = 1;
    case TWO = 2;
    case THREE = 3;
    case FOUR = 4;
    case FIVE = 5;

    public function label(): string
    {
        return match ($this) {
            self::ONE => '⭐',
            self::TWO => '⭐⭐',
            self::THREE => '⭐⭐⭐',
            self::FOUR => '⭐⭐⭐⭐',
            self::FIVE => '⭐⭐⭐⭐⭐'
        };
    }
}
