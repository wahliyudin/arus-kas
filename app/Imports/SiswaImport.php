<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        Siswa::query()->create([
            'nis' => $row['nis'],
            'nama' => $row['nama'],
            'no_hp' => $row['no_hp'],
            'alamat' => $row['alamat'],
        ]);
    }
}