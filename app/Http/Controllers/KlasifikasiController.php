<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KlasifikasiController extends Controller
{
    public function index()
    {
        return view('klasifikasi.index');
    }

    public function list()
    {
        $data = Klasifikasi::query()->get();
        return DataTables::of($data)
            ->editColumn('check', function (Klasifikasi $klasifikasi) {
                return view('klasifikasi.checkbox', compact('klasifikasi'))->render();
            })
            ->editColumn('action', function (Klasifikasi $klasifikasi) {
                return view('klasifikasi.action', compact('klasifikasi'))->render();
            })
            ->rawColumns(['action', 'check'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            Klasifikasi::query()->updateOrCreate([
                'id' => $request->key
            ], [
                'nama' => $request->nama,
            ]);
            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Klasifikasi $klasifikasi)
    {
        try {
            return response()->json($klasifikasi);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Klasifikasi $klasifikasi)
    {
        try {
            $klasifikasi->delete();
            return response()->json([
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
