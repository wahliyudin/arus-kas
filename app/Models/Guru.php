<?php

namespace App\Models;

use App\Enums\JenisKelamin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
        'jenis_kelamin',
    ];

    protected $casts = [
        'jenis_kelamin' => JenisKelamin::class
    ];
}
