<?php

namespace App\Models;

use App\Enums\JenisAkun;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $table = 'akun';

    protected $fillable = [
        'kode',
        'nama',
        'jenis_akun',
    ];

    protected $casts = [
        'jenis_akun' => JenisAkun::class
    ];

    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $model->kode = IdGenerator::generate(['table' => $this->table, 'length' => 6, 'prefix' => date('y')]);
    //     });
    // }
}
