<?php

namespace App\Imports;

use App\Enums\JenisKelamin;
use App\Models\Guru;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        Guru::query()->create([
            'nama' => $row['nama'],
            'no_hp' => $row['no_hp'],
            'alamat' => $row['alamat'],
            'jenis_kelamin' => JenisKelamin::jenisKelamin($row['jenis_kelamin']),
        ]);
    }
}
