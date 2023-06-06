<?php

namespace App\Enums;

enum Penerima: int
{
    case SISWA = 1;
    case PEMASOK = 2;

    public function label()
    {
        return match ($this) {
            self::SISWA => 'Siswa',
            self::PEMASOK => 'Pemasok',
        };
    }
}
