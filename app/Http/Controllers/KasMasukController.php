<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\KasMasuk;
use App\Models\Klasifikasi;
use App\Models\Pemasok;
use App\Models\Siswa;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class KasMasukController extends Controller
{
    public function index()
    {
        $siswas = Siswa::query()->get();
        $pemasoks = Pemasok::query()->get();
        $akuns = Akun::query()->get();
        $klasifikasis = Klasifikasi::query()->get();
        $no = $this->generateNumber();
        $kasMasuks = KasMasuk::query()->get();
        return view('kas-masuk.index', compact('kasMasuks', 'no',  'siswas', 'pemasoks', 'akuns', 'klasifikasis'));
    }

    public function store(Request $request)
    {
        try {
            $kasMasuk = KasMasuk::query()->create([
                'no' => $request->no,
                'tanggal' => $request->tanggal,
                'siswa_id' => $request->siswa,
                'pemasok_id' => $request->pemasok,
                'dari' => $request->dari,
                'keterangan' => $request->keterangan,
            ]);
            $data = $request->detail_kasMasuk;
            $detail = [];
            for ($i = 0; $i < count($data); $i++) {
                array_push($detail, [
                    'kode_akun' => $data[$i]['akun'],
                    'klasifikasi_id' => $data[$i]['klasifikasi'],
                    'debet' => (int)str($data[$i]['debet'])->replace('.', '')->value(),
                    'kredit' => (int)str($data[$i]['kredit'])->replace('.', '')->value(),
                ]);
            }
            $kasMasuk->detailKasMasuk()->createMany($detail);
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(KasMasuk $kasMasuk)
    {
        try {
            return response()->json($kasMasuk);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(KasMasuk $kasMasuk)
    {
        try {
            $kasMasuk->detailKasMasuk()->delete();
            $kasMasuk->delete();
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
        return IdGenerator::generate(['table' => 'kas_masuk', 'field' => 'no', 'length' => 12, 'prefix' => "KM$date-"]);
    }
}
