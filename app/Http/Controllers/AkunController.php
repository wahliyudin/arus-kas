<?php

namespace App\Http\Controllers;

use App\Enums\JenisAkun;
use App\Models\Akun;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
}