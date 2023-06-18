<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JurnalUmumExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function __construct(
        private Collection $data
    ) {
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return ['NO TRANSAKSI', 'TANGGAL', 'NO.REF', 'KETERANGAN', 'KODE AKUN', 'NAMA AKUN', 'DEBET', 'KREDIT'];
    }
}
