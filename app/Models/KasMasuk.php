<?php

namespace App\Models;

use App\Enums\Dari;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasMasuk extends Model
{
    use HasFactory;

    protected $table = 'kas_masuk';

    protected $primaryKey = "kode";

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kode',
        'kode_akun',
        'kode_jurnal',
        'siswa_id',
        'pemasok_id',
        'guru_id',
        'dari',
        'tanggal',
        'keterangan',
    ];

    protected $casts = [
        'dari' => Dari::class
    ];

    protected function kode(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value,
        );
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->kode = IdGenerator::generate(['table' => $model->table, 'field' => 'kode', 'length' => 6, 'prefix' => "KM-"]);
        });
    }

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'kode_akun', 'kode');
    }

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class, 'kode_jurnal', 'kode');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class, 'pemasok_id', 'id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
}
