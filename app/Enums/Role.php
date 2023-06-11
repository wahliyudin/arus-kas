<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case KEPALA_SEKOLAH = 'kepala_sekolah';

    public function label()
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::KEPALA_SEKOLAH => 'Kepala Sekolah',
        };
    }
}
