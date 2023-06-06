<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JurnalUmumController extends Controller
{
    public function index()
    {
        return view('jurnal-umum.index');
    }

    public function datatable(Request $request)
    {
        $range = str($request->get('range'))->explode(' - ');
        $startDate = isset($range[0]) && $range[0] != '' ? Carbon::createFromFormat('m/d/Y', $range[0]) : null;
        $endDate = isset($range[1]) && $range[1] != '' ? Carbon::createFromFormat('m/d/Y', $range[1]) : null;
        return DataTables::collection($this->generate($startDate, $endDate))
            ->make();
    }

    public function export(Request $request)
    {
        $range = str($request->get('range'))->explode(' - ');
        $startDate = isset($range[0]) && $range[0] != '' ? Carbon::createFromFormat('m/d/Y', $range[0]) : null;
        $endDate = isset($range[1]) && $range[1] != '' ? Carbon::createFromFormat('m/d/Y', $range[1]) : null;
        if ($startDate == null && $endDate == null) {
            return response()->json([
                'message' => 'Anda belum memilih tanggal'
            ], 422);
        }
        $jurnals = $this->generate($startDate, $endDate);
        $periode = $startDate->format('d-m-Y') . '  s/d  ' . $endDate->format('d-m-Y');
        return Pdf::loadView('jurnal-umum.pdf', compact('jurnals', 'periode'))->download();
    }

    private function generate(?Carbon $startDate = null, ?Carbon $endDate = null)
    {
        $jurnals = Jurnal::query()->with(['kasMasuk', 'kasKeluar', 'jurnalDetails' => function ($query) {
            $query->latest();
        }])->when($startDate != null && $endDate != null, function ($query) use ($startDate, $endDate) {
            $query->whereBetween('tanggal', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
        })->get();
        $results = [];
        foreach ($jurnals as $jurnal) {
            $i = 0;
            foreach ($jurnal->jurnalDetails as $jurnalDetail) {
                if ($i == 0) {
                    array_push($results, [
                        'kode' => $jurnal->kode,
                        'no_ref' => $jurnal->kasMasuk?->kode ?? $jurnal->kasKeluar?->kode,
                        'tanggal' => $jurnal->tanggal,
                        'keterangan' => $jurnal->keterangan,
                        'kode_akun' => $jurnalDetail->kode_akun,
                        'nama_akun' => $jurnalDetail->akun?->nama,
                        'debet' => number_format($jurnalDetail->debet, 0, ',', '.'),
                        'kredit' => number_format($jurnalDetail->kredit, 0, ',', '.'),
                    ]);
                } else {
                    array_push($results, [
                        'kode' => '',
                        'no_ref' => '',
                        'tanggal' => '',
                        'keterangan' => '',
                        'kode_akun' => $jurnalDetail->kode_akun,
                        'nama_akun' => $jurnalDetail->akun?->nama,
                        'debet' => number_format($jurnalDetail->debet, 0, ',', '.'),
                        'kredit' => number_format($jurnalDetail->kredit, 0, ',', '.'),
                    ]);
                }
                $i++;
            }
        }
        return collect($results);
    }
}