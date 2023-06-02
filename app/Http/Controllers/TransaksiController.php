<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Klasifikasi;
use App\Models\Pemasok;
use App\Models\Siswa;
use App\Models\Transaksi;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    public function index()
    {
        $siswas = Siswa::query()->get();
        $pemasoks = Pemasok::query()->get();
        $akuns = Akun::query()->get();
        $klasifikasis = Klasifikasi::query()->get();
        $no = $this->generateNumber();
        $transaksis = Transaksi::query()->get();
        return view('transaksi.index', compact('transaksis', 'no',  'siswas', 'pemasoks', 'akuns', 'klasifikasis'));
    }

    public function store(Request $request)
    {
        try {
            $transaksi = Transaksi::query()->create([
                'no' => $request->no,
                'tanggal' => $request->tanggal,
                'siswa_id' => $request->siswa,
                'pemasok_id' => $request->pemasok,
                'dari' => $request->dari,
                'keterangan' => $request->keterangan,
            ]);
            $data = $request->detail_transaksi;
            $detail = [];
            for ($i = 0; $i < count($data); $i++) {
                array_push($detail, [
                    'kode_akun' => $data[$i]['akun'],
                    'klasifikasi_id' => $data[$i]['klasifikasi'],
                    'debet' => (int)str($data[$i]['debet'])->replace('.', '')->value(),
                    'kredit' => (int)str($data[$i]['kredit'])->replace('.', '')->value(),
                ]);
            }
            $transaksi->detailTransaksi()->createMany($detail);
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Transaksi $transaksi)
    {
        try {
            return response()->json($transaksi);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Transaksi $transaksi)
    {
        try {
            $transaksi->detailTransaksi()->delete();
            $transaksi->delete();
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
        return IdGenerator::generate(['table' => 'transaksi', 'field' => 'no', 'length' => 11, 'prefix' => "T$date-"]);
    }
}
