<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AkunController extends Controller
{
    public function index()
    {
        return view('akun.index');
    }

    public function list()
    {
        $data = Akun::query()->get();
        return DataTables::of($data)
            ->editColumn('jenis_akun', function (Akun $akun) {
                return $akun->jenis_akun->label();
            })
            ->editColumn('check', function (Akun $akun) {
                return view('akun.checkbox', compact('akun'))->render();
            })
            ->editColumn('action', function (Akun $akun) {
                return view('akun.action', compact('akun'))->render();
            })
            ->rawColumns(['action', 'check'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            Akun::query()->updateOrCreate([
                'id' => $request->key
            ], [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'jenis_akun' => $request->jenis_akun,
            ]);
            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Akun $akun)
    {
        try {
            return response()->json($akun);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Akun $akun)
    {
        try {
            $akun->delete();
            return response()->json([
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
