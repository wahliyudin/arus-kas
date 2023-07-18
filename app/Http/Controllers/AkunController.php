<?php

namespace App\Http\Controllers;

use App\Enums\JenisAkun;
use App\Imports\AkunImport;
use App\Models\Akun;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AkunController extends Controller
{
    public function index()
    {
        return view('akun.index');
    }

    public function list()
    {
        $data = Akun::query()->get();
        return DataTables::of($data)
            ->editColumn('jenis_akun', function (Akun $akun) {
                return $akun->jenis_akun->label();
            })
            ->editColumn('check', function (Akun $akun) {
                return view('akun.checkbox', compact('akun'))->render();
            })
            ->editColumn('action', function (Akun $akun) {
                return view('akun.action', compact('akun'))->render();
            })
            ->rawColumns(['action', 'check'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            Akun::query()->updateOrCreate([
                'id' => $request->key
            ], [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'jenis_akun' => $request->jenis_akun,
            ]);
            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Akun $akun)
    {
        try {
            return response()->json($akun);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Akun $akun)
    {
        try {
            $akun->delete();
            return response()->json([
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getNumber($value)
    {
        try {
            return response()->json([
                'kode' => $this->generateNumber($value)
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function generateNumber($val)
    {
        $jenisAkun = match ((int)$val) {
            JenisAkun::AKTIVA_LANCAR->value => JenisAkun::AKTIVA_LANCAR,
            JenisAkun::INVESTASI_JANGKA_PANJANG->value => JenisAkun::INVESTASI_JANGKA_PANJANG,
            JenisAkun::AKTIVA_TETAP->value => JenisAkun::AKTIVA_TETAP,
            JenisAkun::AKTIVA_TETAP_TIDAK_BERWUJUD->value => JenisAkun::AKTIVA_TETAP_TIDAK_BERWUJUD,
            JenisAkun::KEWAJIBAN->value => JenisAkun::KEWAJIBAN,
            JenisAkun::AKTIVA_LAIN_LAIN->value => JenisAkun::AKTIVA_LAIN_LAIN,
            JenisAkun::KEWAJIBAN_JANGKA_PANJANG->value => JenisAkun::KEWAJIBAN_JANGKA_PANJANG,
            JenisAkun::EKUITAS->value => JenisAkun::EKUITAS,
            JenisAkun::PENDAPATAN->value => JenisAkun::PENDAPATAN,
            JenisAkun::BEBAN->value => JenisAkun::BEBAN,
            default => 0,
        };
        $akun = Akun::query()->where('jenis_akun', $jenisAkun)->latest()->first();
        if ($akun) {
            $currentKode = (int) substr($akun->kode, 2) + 1;
        } else {
            $currentKode = 1;
        }
        return (string)$jenisAkun->kode() . $currentKode;
    }

    public function template()
    {
        $spreadsheet = new Spreadsheet();
        $akun = $spreadsheet->getActiveSheet();
        $master = $spreadsheet->addSheet(new Worksheet($spreadsheet));

        $master->setTitle('master');
        $akun->setTitle('akun');

        $titles = [
            'Nama',
            'Jenis Akun',
        ];
        $h = 'A';
        foreach ($titles as $i => $val) {
            $akun->setCellValue($h . '1', $val);
            $h = $this->incrementLetter($h);
        }

        $columnIterator = $akun->getColumnIterator();
        foreach ($columnIterator as $column) {
            $dimension = $akun->getColumnDimension($column->getColumnIndex());
            $dimension->setWidth(20);
        }

        $master->getStyle('A1:B1')
            ->getFont()
            ->setBold(true);
        $akun->getStyle('A1:B1')
            ->getFont()
            ->setBold(true);


        $master->setCellValue('A1', 'Jenis Akun');
        $master->getColumnDimension('A')->setAutoSize(true);
        $data = collect(JenisAkun::cases())->pluck('name')->toArray();
        $dropdownRange = '$A$2:$A$' . (count($data) + 2);
        foreach ($data as $index => $item) {
            $cell = 'A' . ($index + 2);
            $master->setCellValue($cell, $item);
        }
        $dataValidation = $akun->getCell('B2')->getDataValidation();
        $dataValidation->setType(DataValidation::TYPE_LIST)
            ->setAllowBlank(true)
            ->setShowDropDown(true)
            ->setFormula1('=master!' . $dropdownRange);
        $akun->setDataValidation('B2:B10', $dataValidation);
        $master->setSheetState('hidden');

        $writer = new Xlsx($spreadsheet);
        $writer->save('assets/template/akun.xlsx');
        return response()->download('assets/template/akun.xlsx');
    }

    public function incrementLetter($letter)
    {
        $ascii = ord($letter);
        $ascii++;
        $newLetter = chr($ascii);
        return $newLetter;
    }

    public function import(Request $request)
    {
        try {
            $request->validate([
                'file' => ['required', 'file']
            ]);
            Excel::import(new AkunImport(), $request->file('file'));
            return response()->json([
                'message' => 'Berhasil diimport'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
