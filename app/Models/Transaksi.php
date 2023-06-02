<?php

namespace App\Models;

use App\Enums\Dari;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'no',
        'tanggal',
        'siswa_id',
        'pemasok_id',
        'dari',
        'keterangan',
    ];

    protected $casts = [
        'dari' => Dari::class
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'no_transaksi', 'no');
    }
}
