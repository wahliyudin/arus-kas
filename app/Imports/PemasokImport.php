<?php

namespace App\Imports;

use App\Models\Pemasok;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PemasokImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        Pemasok::query()->create([
            'nama' => $row['nama'],
            'no_hp' => $row['no_hp'],
            'alamat' => $row['alamat'],
        ]);
    }
}