<?php

namespace App\Enums;

enum JenisKelamin: string
{
    case LAKI_LAKI = 'L';
    case PEREMPUAN = 'P';

    public function label()
    {
        return match ($this) {
            self::LAKI_LAKI => 'Laki - Laki',
            self::PEREMPUAN => 'Perempuan',
        };
    }
}
