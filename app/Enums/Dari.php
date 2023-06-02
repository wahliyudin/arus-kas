<?php

namespace App\Enums;

enum Dari: int
{
    case SISWA = 1;
    case PEMASOK = 2;
    case DANA_BOS = 3;

    public function label()
    {
        return match ($this) {
            self::SISWA => 'Siswa',
            self::PEMASOK => 'Pemasok',
            self::DANA_BOS => 'Dana Bos',
        };
    }
}
