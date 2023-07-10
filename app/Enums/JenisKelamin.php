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

    public static function jenisKelamin($val)
    {
        $val = str($val)->lower()->remove('-')->remove(' ')->value();
        foreach (static::cases() as $case) {
            if ($val == str($case->label())->lower()->trim()->remove('-')->remove(' ')->value()) {
                return $case;
            }
        }
        return null;
    }
}
