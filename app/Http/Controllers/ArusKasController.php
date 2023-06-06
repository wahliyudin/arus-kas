<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Klasifikasi;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ArusKasController extends Controller
{
    public function index()
    {
        return view('arus-kas.index');
    }

    public function datatable(Request $request)
    {
        $range = str($request->get('range'))->explode(' - ');
        $startDate = isset($range[0]) && $range[0] != '' ? Carbon::createFromFormat('m/d/Y', $range[0]) : null;
        $endDate = isset($range[1]) && $range[1] != '' ? Carbon::createFromFormat('m/d/Y', $range[1]) : null;
        return DataTables::collection($this->generate($startDate, $endDate))
            ->rawColumns(['one', 'two', 'three', 'four'])
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
        return Pdf::loadView('arus-kas.pdf', compact('jurnals', 'periode'))->download();
    }

    private function generate(?Carbon $startDate = null, ?Carbon $endDate = null)
    {
        $klasifikasis = Klasifikasi::query()->withWhereHas('jurnalDetails', function ($query) use ($startDate, $endDate) {
            $query->withWhereHas('jurnal', function ($query) use ($startDate, $endDate) {
                $query->when($startDate != null && $endDate != null, fn ($query) => $query->whereBetween('tanggal', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')]));
            });
        })->get();
        $results = [];
        foreach ($klasifikasis as $klasifikasi) {
            array_push($results, [
                'one' => '<span style="color: black; font-weight: 700;">' . $klasifikasi->nama . '</span>',
                'two' => '<span style="color: black; font-weight: 700;">Debet</span>',
                'three' => '<span style="color: black; font-weight: 700;">Kredit</span>',
                'four' => '<span style="color: black; font-weight: 700;">Total</span>',
            ]);
            $total = 0;
            foreach ($klasifikasi->jurnalDetails as $jurnalDetail) {
                $total += $jurnalDetail->debet;
                $total -= $jurnalDetail->kredit;
                array_push($results, [
                    'one' => $jurnalDetail->jurnal?->keterangan,
                    'two' => number_format($jurnalDetail->debet, 0, ',', '.'),
                    'three' => number_format($jurnalDetail->kredit, 0, ',', '.'),
                    'four' => '',
                ]);
            }
            array_push($results, [
                'one' => '',
                'two' => '',
                'three' => '',
                'four' => number_format($total, 0, ',', '.'),
            ]);
        }
        return collect($results);
    }
}
