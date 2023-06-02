<?php

namespace App\Models;

use App\Enums\Penerima;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasKeluar extends Model
{
    use HasFactory;

    protected $table = 'kas_masuk';

    protected $fillable = [
        'no',
        'tanggal',
        'siswa_id',
        'pemasok_id',
        'penerima',
        'keterangan',
    ];

    protected $casts = [
        'penerima' => Penerima::class
    ];

    public function detailKasKeluar()
    {
        return $this->hasMany(DetailKasKeluar::class, 'no_kas_keluar', 'no');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'pemasok_id', 'id');
    }
}
