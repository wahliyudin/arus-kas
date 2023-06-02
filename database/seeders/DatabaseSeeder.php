<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Akun;
use App\Models\Klasifikasi;
use App\Models\Pemasok;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Akun::factory(10)->create();
        Pemasok::factory(10)->create();
        Siswa::factory(10)->create();
        Klasifikasi::factory(10)->create();
    }
}
