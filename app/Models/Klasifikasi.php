<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use HasFactory;

    protected $table = 'klasifikasi';

    protected $fillable = [
        'nama'
    ];

    public function jurnalDetails()
    {
        return $this->hasMany(JurnalDetail::class, 'klasifikasi_id', 'id');
    }
}
