<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BukuBesarController extends Controller
{
    public function index()
    {
        return view('buku-besar.index');
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
        return Pdf::loadView('buku-besar.pdf', compact('jurnals', 'periode'))->download();
    }

    private function generate(?Carbon $startDate = null, ?Carbon $endDate = null)
    {
        $jurnals = Jurnal::query()->with(['jurnalDetails' => function ($query) {
            $query->latest();
        }])->when($startDate != null && $endDate != null, function ($query) use ($startDate, $endDate) {
            $query->whereBetween('tanggal', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')]);
        })->get();
        $results = [];
        $saldo = 0;
        foreach ($jurnals as $jurnal) {
            foreach ($jurnal->jurnalDetails as $jurnalDetail) {
                $saldo += $jurnalDetail->debet;
                $saldo -= $jurnalDetail->kredit;
                array_push($results, [
                    'kode' => $jurnal->kode,
                    'tanggal' => $jurnal->tanggal,
                    'keterangan' => $jurnal->keterangan,
                    'debet' => number_format($jurnalDetail->debet, 0, ',', '.'),
                    'kredit' => number_format($jurnalDetail->kredit, 0, ',', '.'),
                    'saldo' => number_format($saldo, 0, ',', '.'),
                ]);
            }
        }
        return collect($results);
    }
}
