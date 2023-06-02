<?php

namespace App\Models;

use App\Enums\Dari;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasMasuk extends Model
{
    use HasFactory;

    protected $table = 'kas_masuk';

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

    public function detailKasMasuk()
    {
        return $this->hasMany(DetailKasMasuk::class, 'no_kas_masuk', 'no');
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
