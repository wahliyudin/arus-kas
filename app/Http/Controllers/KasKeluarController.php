<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Guru;
use App\Models\Jurnal;
use App\Models\KasKeluar;
use App\Models\Klasifikasi;
use App\Models\Pemasok;
use App\Models\Siswa;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KasKeluarController extends Controller
{
    public function index()
    {
        return view('kas-keluar.index');
    }

    public function list()
    {
        $data = KasKeluar::query()->get();
        return DataTables::of($data)
            ->editColumn('penerima', function (KasKeluar $kasKeluar) {
                return $kasKeluar->penerima?->label();
            })
            ->editColumn('check', function (KasKeluar $kasKeluar) {
                return view('kas-keluar.checkbox', compact('kasKeluar'))->render();
            })
            ->editColumn('action', function (KasKeluar $kasKeluar) {
                return view('kas-keluar.action', compact('kasKeluar'))->render();
            })
            ->rawColumns(['action', 'check'])
            ->make(true);
    }

    public function create()
    {
        $akuns = Akun::query()->get();
        $siswas = Siswa::query()->get();
        $pemasoks = Pemasok::query()->get();
        $gurus = Guru::query()->get();
        $klasifikasis = Klasifikasi::query()->get();
        $kode = IdGenerator::generate(['table' => 'kas_masuk', 'field' => 'kode', 'length' => 6, 'prefix' => "KK-"]);
        return view('kas-keluar.create', compact('kode', 'akuns', 'siswas', 'klasifikasis', 'pemasoks', 'gurus'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'tanggal' => 'required',
                'kode_akun' => 'required',
                'penerima' => 'required',
            ]);
            $jurnal = Jurnal::query()->create([
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
            ]);
            $jurnalDetails = [];
            $transaksis = $request->detail_transaksi;
            for ($i = 0; $i < count($transaksis); $i++) {
                array_push($jurnalDetails, [
                    'kode_akun' => $transaksis[$i]['kode_akun'],
                    'klasifikasi_id' => $transaksis[$i]['klasifikasi_id'],
                    'debet' => str($transaksis[$i]['debet'])->replace('.', ''),
                    'kredit' => str($transaksis[$i]['kredit'])->replace('.', ''),
                ]);
            }
            $jurnal->jurnalDetails()->createMany($jurnalDetails);
            KasKeluar::query()->create([
                'kode_akun' => $request->kode_akun,
                'kode_jurnal' => $jurnal->kode,
                'siswa_id' => $request->siswa_id,
                'pemasok_id' => $request->pemasok_id,
                'guru_id' => $request->guru_id,
                'penerima' => $request->penerima,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
            ]);
            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(KasKeluar $kasKeluar)
    {
        $akuns = Akun::query()->get();
        $siswas = Siswa::query()->get();
        $pemasoks = Pemasok::query()->get();
        $gurus = Guru::query()->get();
        $klasifikasis = Klasifikasi::query()->get();
        return view('kas-keluar.edit', compact('akuns', 'kasKeluar', 'siswas', 'klasifikasis', 'pemasoks', 'gurus'));
    }

    public function update(Request $request, KasKeluar $kasKeluar)
    {
        try {
            $request->validate([
                'tanggal' => 'required',
                'kode_akun' => 'required',
                'penerima' => 'required',
            ]);
            $kasKeluar->jurnal()->update([
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
            ]);
            $kasKeluar->jurnal?->jurnalDetails()->delete();
            $jurnalDetails = [];
            $transaksis = $request->detail_transaksi;
            for ($i = 0; $i < count($transaksis); $i++) {
                array_push($jurnalDetails, [
                    'kode_akun' => $transaksis[$i]['kode_akun'],
                    'klasifikasi_id' => $transaksis[$i]['klasifikasi_id'],
                    'debet' => str($transaksis[$i]['debet'])->replace('.', ''),
                    'kredit' => str($transaksis[$i]['kredit'])->replace('.', ''),
                ]);
            }
            $kasKeluar->jurnal?->jurnalDetails()->createMany($jurnalDetails);
            $kasKeluar->update([
                'kode_akun' => $request->kode_akun,
                'siswa_id' => $request->siswa_id,
                'pemasok_id' => $request->pemasok_id,
                'guru_id' => $request->guru_id,
                'penerima' => $request->penerima,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
            ]);
            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(KasKeluar $kasKeluar)
    {
        try {
            $kasKeluar->jurnal()->delete();
            $kasKeluar->delete();
            return response()->json([
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}