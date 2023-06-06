<?php

namespace App\Enums;

enum Dari: int
{
    case SISWA = 1;
    case PEMASOK = 2;
    case GURU = 3;
    case DANA_BOS = 4;

    public function label()
    {
        return match ($this) {
            self::SISWA => 'Siswa',
            self::PEMASOK => 'Pemasok',
            self::GURU => 'Guru',
            self::DANA_BOS => 'Dana Bos',
        };
    }
}
