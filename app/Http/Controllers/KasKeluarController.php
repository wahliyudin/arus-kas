<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\KasKeluar;
use App\Models\Klasifikasi;
use App\Models\Pemasok;
use App\Models\Siswa;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class KasKeluarController extends Controller
{
    public function index()
    {
        $siswas = Siswa::query()->get();
        $pemasoks = Pemasok::query()->get();
        $akuns = Akun::query()->get();
        $klasifikasis = Klasifikasi::query()->get();
        $no = $this->generateNumber();
        $kasKeluars = KasKeluar::query()->get();
        return view('kas-keluar.index', compact('kasKeluars', 'no',  'siswas', 'pemasoks', 'akuns', 'klasifikasis'));
    }

    public function store(Request $request)
    {
        try {
            $kasKeluar = KasKeluar::query()->create([
                'no' => $request->no,
                'tanggal' => $request->tanggal,
                'siswa_id' => $request->siswa,
                'pemasok_id' => $request->pemasok,
                'penerima' => $request->penerima,
                'keterangan' => $request->keterangan,
            ]);
            $data = $request->detail_kas_keluar;
            $detail = [];
            for ($i = 0; $i < count($data); $i++) {
                array_push($detail, [
                    'kode_akun' => $data[$i]['akun'],
                    'klasifikasi_id' => $data[$i]['klasifikasi'],
                    'debet' => (int)str($data[$i]['debet'])->replace('.', '')->value(),
                    'kredit' => (int)str($data[$i]['kredit'])->replace('.', '')->value(),
                ]);
            }
            $kasKeluar->detailKasKeluar()->createMany($detail);
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(KasKeluar $kasKeluar)
    {
        try {
            return response()->json($kasKeluar);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(KasKeluar $kasKeluar)
    {
        try {
            $kasKeluar->detailKasKeluar()->delete();
            $kasKeluar->delete();
            return response()->json([
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function generateNumber()
    {
        $date = now()->format('ymd');
        return IdGenerator::generate(['table' => 'kas_keluar', 'field' => 'no', 'length' => 11, 'prefix' => "T$date-"]);
    }
}
