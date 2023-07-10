<?php

namespace App\Http\Controllers;

use App\Imports\PemasokImport;
use App\Models\Pemasok;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class PemasokController extends Controller
{
    public function index()
    {
        return view('pemasok.index');
    }

    public function list()
    {
        $data = Pemasok::query()->get();
        return DataTables::of($data)
            ->editColumn('check', function (Pemasok $pemasok) {
                return view('pemasok.checkbox', compact('pemasok'))->render();
            })
            ->editColumn('action', function (Pemasok $pemasok) {
                return view('pemasok.action', compact('pemasok'))->render();
            })
            ->rawColumns(['action', 'check'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            Pemasok::query()->updateOrCreate([
                'id' => $request->key
            ], [
                'no_hp' => $request->no_hp,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ]);
            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Pemasok $pemasok)
    {
        try {
            return response()->json($pemasok);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Pemasok $pemasok)
    {
        try {
            $pemasok->delete();
            return response()->json([
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new PemasokImport, $request->file('file'));
            return response()->json([
                'message' => 'Berhasil diimport'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
