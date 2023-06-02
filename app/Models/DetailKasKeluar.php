<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKasKeluar extends Model
{
    use HasFactory;

    protected $table = 'detail_kas_keluar';

    protected $fillable = [
        'kode_akun',
        'klasifikasi_id',
        'debet',
        'kredit',
    ];

    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class, 'klasifikasi_id', 'id');
    }
}
