<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalDetail extends Model
{
    use HasFactory;

    protected $table = 'jurnal_detail';

    protected $fillable = [
        'kode_akun',
        'kode_jurnal',
        'debet',
        'kredit',
    ];

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class, 'kode_jurnal', 'kode');
    }

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'kode_akun', 'kode');
    }
}
