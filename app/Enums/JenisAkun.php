<?php

namespace App\Enums;

enum JenisAkun: int
{
    case ASSET = 1;
    case PENDAPATAN = 2;
    case BEBAN = 3;

    public function label()
    {
        return match ($this) {
            self::ASSET => 'Asset',
            self::PENDAPATAN => 'Pendapatan',
            self::BEBAN => 'Beban',
        };
    }
}
