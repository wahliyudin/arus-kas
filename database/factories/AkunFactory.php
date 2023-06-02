<?php

namespace Database\Factories;

use App\Enums\JenisAkun;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Akun>
 */
class AkunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenisAkun = fake()->randomElement(JenisAkun::cases());
        $kode = IdGenerator::generate(['table' => 'akun', 'field' => 'kode', 'length' => 3, 'prefix' => $jenisAkun->kode()]);
        return [
            'kode' => $kode,
            'nama' => fake()->name(),
            'jenis_akun' => $jenisAkun,
        ];
    }
}
