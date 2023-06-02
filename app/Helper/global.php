<?php

use App\Enums\Dari;
use App\Models\Transaksi;

if (!function_exists('transaksiDari')) {
    function transaksiDari(Transaksi $transaksi)
    {
        return match ($transaksi->dari) {
            Dari::SISWA => $transaksi->siswa?->nama,
            Dari::PEMASOK => $transaksi->pemasok?->nama,
            Dari::DANA_BOS => Dari::DANA_BOS->label(),
        };
    }
}
