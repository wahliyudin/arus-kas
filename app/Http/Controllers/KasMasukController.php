<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Guru;
use App\Models\Jurnal;
use App\Models\KasMasuk;
use App\Models\Klasifikasi;
use App\Models\Pemasok;
use App\Models\Siswa;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KasMasukController extends Controller
{
    public function index()
    {
        return view('kas-masuk.index');
    }

    public function list()
    {
        $data = KasMasuk::query()->get();
        return DataTables::of($data)
            ->editColumn('dari', function (KasMasuk $kasMasuk) {
                return $kasMasuk->dari?->label();
            })
            ->editColumn('check', function (KasMasuk $kasMasuk) {
                return view('kas-masuk.checkbox', compact('kasMasuk'))->render();
            })
            ->editColumn('action', function (KasMasuk $kasMasuk) {
                return view('kas-masuk.action', compact('kasMasuk'))->render();
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
        $kode = IdGenerator::generate(['table' => 'kas_masuk', 'field' => 'kode', 'length' => 6, 'prefix' => "KM-"]);
        return view('kas-masuk.create', compact('kode', 'akuns', 'siswas', 'klasifikasis', 'pemasoks', 'gurus'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'tanggal' => 'required',
                'kode_akun' => 'required',
                'dari' => 'required',
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
            KasMasuk::query()->create([
                'kode_akun' => $request->kode_akun,
                'kode_jurnal' => $jurnal->kode,
                'siswa_id' => $request->siswa_id,
                'pemasok_id' => $request->pemasok_id,
                'guru_id' => $request->guru_id,
                'dari' => $request->dari,
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

    public function edit(KasMasuk $kasMasuk)
    {
        $akuns = Akun::query()->get();
        $siswas = Siswa::query()->get();
        $pemasoks = Pemasok::query()->get();
        $gurus = Guru::query()->get();
        $klasifikasis = Klasifikasi::query()->get();
        return view('kas-masuk.edit', compact('akuns', 'kasMasuk', 'siswas', 'klasifikasis', 'pemasoks', 'gurus'));
    }

    public function update(Request $request, KasMasuk $kasMasuk)
    {
        try {
            $request->validate([
                'tanggal' => 'required',
                'kode_akun' => 'required',
                'dari' => 'required',
            ]);
            $kasMasuk->jurnal()->update([
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
            ]);
            $kasMasuk->jurnal?->jurnalDetails()->delete();
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
            $kasMasuk->jurnal?->jurnalDetails()->createMany($jurnalDetails);
            $kasMasuk->update([
                'kode_akun' => $request->kode_akun,
                'siswa_id' => $request->siswa_id,
                'pemasok_id' => $request->pemasok_id,
                'guru_id' => $request->guru_id,
                'dari' => $request->dari,
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

    public function destroy(KasMasuk $kasMasuk)
    {
        try {
            $kasMasuk->jurnal()->delete();
            $kasMasuk->delete();
            return response()->json([
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
